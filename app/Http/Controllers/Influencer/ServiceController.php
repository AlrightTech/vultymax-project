<?php

namespace App\Http\Controllers\Influencer;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceGallery;
use App\Models\Tag;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller {

    public function all() {
        $pageTitle = 'All Services';
        $services  = $this->serviceData();
        return view('Template::influencer.service.list', compact('pageTitle', 'services'));
    }

    public function create() {
        $pageTitle = "Create New Service";
        $categories        = Category::active()->select('id', 'name', 'image')->get();
        $tags = Tag::all();
        return view('Template::influencer.service.create', compact('pageTitle','categories','tags'));
    }

    public function edit($id) {
        $pageTitle = "Update Service";
        $service   = Service::where('influencer_id', authInfluencerId())->with('gallery', 'tags')->findOrFail($id);
        $categories        = Category::active()->select('id', 'name', 'image')->get();
        $tags = Tag::all();
        $images = [];


        foreach ($service->gallery as $gallery) {
            $img['id']  = $gallery->id;
            $img['src'] = getImage(getFilePath('service') . '/' . $gallery->image);
            $images[]   = $img;
        }

        return view('Template::influencer.service.create', compact('pageTitle','tags','service','categories', 'images'));
    }

    public function store(Request $request, $id = 0) {


        $this->validation($request->all(), $id)->validate();
        $influencer = authInfluencer();
        $general = gs();

        $service = $this->insertService( $request, $general, $id, $influencer->id);
        $this->insertTag($service, $id);

        if ($id) {
            $oldImages   = $service->gallery->pluck('id')->toArray();
            $imageRemove = array_values(array_diff($oldImages, $request->old ?? []));
            $location    = getFilePath('service');

            foreach ($imageRemove as $remove) {
                $singleImage = ServiceGallery::where('service_id',$service->id)->find($remove);
                fileManager()->removeFile($location . '/' . $singleImage->image);
                fileManager()->removeFile($location . '/thumb_' . $singleImage->image);
                $singleImage->delete();
            }

            $notification = 'Service updated successfully';
        }

        $this->serviceImages($request, $service);

        if (!$id) {
            $adminNotification                = new AdminNotification();
            $adminNotification->influencer_id = $influencer->id;
            $adminNotification->title         = 'New service created by ' . $influencer->username;
            $adminNotification->click_url     = urlPath('admin.service.detail', $service->id);
            $adminNotification->save();
            $notification = 'Service created successfully';
        }

        $notify[] = ['success', $notification];
        return to_route('influencer.service.all')->withNotify($notify);
    }

    protected function validation(array $data, $id) {

        $imageValidation = !$id ? 'required' : 'nullable';

        $validate = Validator::make($data, [
            'category_id'  => 'required|integer|exists:categories,id',
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|gte:0',
            'tags'         => 'required|array|min:1',
            'key_points'   => 'required|array|min:1',
            'key_points.*' => 'required|string|max:255',
            'image'        => [$imageValidation, 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'images'       => 'nullable|array',
            'images.*'     => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ], [
            'key_points.*.required' => 'Key points is required',
        ]);


        return $validate;
    }

    protected function insertService($request,$general, $id,  $influencerId) {

        $category= Category::active()->find($request->category_id);

        if(!$category){
            $notify[]=['error','This category is not activated'];
            return back()->withNotify($notify);
        }

        if ($id) {
            $service  = Service::where('influencer_id', $influencerId)->findOrFail($id);
            $oldImage = $service->image;
        } else {
            $service  = new Service();
            $oldImage = null;
            $service->influencer_id = $influencerId;
        }

        $service->category_id   = $category->id;
        $service->title         = $request->title;
        $service->price         = $request->price;
        $service->description   = $request->description;
        $service->key_points    = $request->key_points;
        $service->status        = $general->service_approve == Status::ENABLE ?? Status::DISABLE;

        if ($request->hasFile('image')) {
            try {
                $service->image = fileUploader($request->image, getFilePath('service'), getFileSize('service'), $oldImage, getFileThumb('service'));
            } catch (\Exception$exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }

        }
        $service->save();
        return $service;
    }

    protected function insertTag($service, $id) {
        $request = request();

        foreach ($request->tags as $tag) {
            $tagExist = Tag::where('name', $tag)->first();
            if ($tagExist) {
                $tagId[] = $tagExist->id;
            } else {
                $newTag       = new Tag();
                $newTag->name = $tag;
                $newTag->save();
                $tagId[] = $newTag->id;
            }
        }

        if ($id) {
            $service->tags()->sync($tagId);
        } else {
            $service->tags()->attach($tagId);
        }

    }

    protected function serviceImages($request, $service) {

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                    try {
                        $newImage = fileUploader($image, getFilePath('service'), getFileSize('service'), null, getFileThumb('service'));
                    } catch (\Exception$exp) {
                        $notify[] = ['error', 'Couldn\'t upload your image.'];
                        return back()->withNotify($notify);
                    }

                    $gallery             = new ServiceGallery();
                    $gallery->service_id = $service->id;
                    $gallery->image      = $newImage;
                    $gallery->save();
            }
        }
    }

    public function pending() {
        $pageTitle = 'Pending Services';
        $services  = $this->serviceData('pending');
        return view('Template::influencer.service.list', compact('pageTitle', 'services'));
    }

    public function approved() {
        $pageTitle = 'Approved Services';
        $services  = $this->serviceData('approved');
        return view('Template::influencer.service.list', compact('pageTitle', 'services'));
    }

    public function rejected() {
        $pageTitle = 'Rejected Services';
        $services  = $this->serviceData('rejected');
        return view('Template::influencer.service.list', compact('pageTitle', 'services'));
    }

    protected function serviceData($scope = null) {
        if ($scope) {
            $services = Service::$scope();
        } else {
            $services = Service::query();
        }
        return $services->searchable(['title','category:name'])->where('influencer_id', authInfluencerId())->with('category')->withCount('totalOrder', 'completeOrder')->latest()->paginate(getPaginate());
    }

    public function orders(Request $request, $id) {
        $pageTitle = 'Service Order List';

        $service = Service::approved()->where('influencer_id', authInfluencerId())->findOrFail($id);
        $orders  = Order::searchable(['order_no','user:username'])->where('service_id', $service->id)->with('user')->latest()->paginate(getPaginate());
        return view('Template::influencer.order.list', compact('pageTitle', 'orders'));
    }

}

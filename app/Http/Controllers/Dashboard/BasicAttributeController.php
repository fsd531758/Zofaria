<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BasicAttributeRequest;
//use Illuminate\Support\Facades\Config;
use App\Models\BasicAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BasicAttributeController extends Controller
{
    private $basic_attribute;

    public function __construct(BasicAttribute $basic_attribute)
    {
        $this->middleware(['permission:read-basic_attributes'])->only('index', 'show');
        $this->middleware(['permission:create-basic_attributes'])->only('create', 'store');
        $this->middleware(['permission:update-basic_attributes'])->only('edit', 'update');
        $this->middleware(['permission:delete-basic_attributes'])->only('destroy');
        $this->basic_attribute = $basic_attribute;
    }

    public function index()
    {
        try {
            $child_regex = config('shared.child');
            $basic_attributes = BasicAttribute::where("item_id", "REGEXP", $child_regex)->get();
            return view('admin.basic_attributes.index', compact('basic_attributes'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        try {
            $parent_regex = config('shared.parent');
            $parents = BasicAttribute::where("item_id", "REGEXP", $parent_regex)->get();
            return view('admin.basic_attributes.create', compact('parents'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function store(BasicAttributeRequest $request)
    {
        try {

            $requested_data = $request->except(['_token']);
            $basic_attribute = $this->basic_attribute->create($requested_data);
            return redirect()->route('basic-attributes.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(BasicAttribute $basic_attribute)
    {
        return view('admin.basic_attributes.show', compact('category'));
    }

    public function edit(BasicAttribute $basic_attribute)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(BasicAttributeRequest $request, BasicAttribute $basic_attribute)
    {
        try {
            if (!$request->has('status')) {
                $request->request->add(['status' => 0]);
            } else {
                $request->request->add(['status' => 1]);
            }

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image', 'deleteFile']);
            $requested_data['updated_at'] = Carbon::now();

            $basic_attribute->update($requested_data);

            return redirect()->route('categories.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(BasicAttribute $basic_attribute)
    {
        try {
            $basic_attribute->delete();
            return redirect()->route('categories.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}

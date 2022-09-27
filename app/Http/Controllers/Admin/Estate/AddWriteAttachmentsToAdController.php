<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdWriteAttachment;
use App\Models\PivotAdAttached;
use App\Models\PivotAdWriteAttachment;
use Illuminate\Http\Request;

class AddWriteAttachmentsToAdController extends Controller
{
    public function create($slug)
    {
        $ad = Ad::query()->where('slug', $slug)->first();
        $attachments = AdWriteAttachment::query()->get();
        return view('admin.pages.Estates.writeAttachments.addAttachment.create', compact('attachments', 'ad'));
    }

    public function store(Request $request, $slug)
    {
        $ad = Ad::query()->where('slug', $slug)->first();

        $ad->writeAttachments()->detach();
        if ($request->attachCh)
        {
            foreach ($request->attachCh as $key => $item)
            {
                PivotAdWriteAttachment::query()->create([
                    'ad_id' => $ad->id,
                    'ad_write_attachment_id' => $item,
                    'body' => $request->attach[$key]
                ]);
            }
        }
        session()->flash('success', 'تم اضافة المرفق بنجاح');
        return back();
    }
}

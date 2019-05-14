<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;

class MailChimpCampaignFoldersController extends MailChimpController
{
    /* ---------- Campaign Folders ---------- */
    
    public function __construct() {
        parent::__construct();
    }

    // Create campaign folder
    public function postCampaignFolders(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
    
            $result = $this->mailChimp->post("campaign-folders", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all campaign folders
    public function getCampaignFolders()
    {
        try {
            $result = $this->mailChimp->get("campaign-folders");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a specific list member
    public function showCampaignFolders($folder_id)
    {
        try {
            $result = $this->mailChimp->get("campaign-folders/$folder_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a campaign folder
    public function patchCampaignFolders(Request $request, $folder_id)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);

            $result = $this->mailChimp->patch("campaign-folders/$folder_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a campaign folder
    public function deleteCampaignFolders($folder_id)
    {
        try {
            $result = $this->mailChimp->delete("campaign-folders/$folder_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

}

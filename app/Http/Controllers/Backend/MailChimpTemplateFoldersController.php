<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;

class MailChimpTemplateFoldersController extends MailChimpController
{
    /* ---------- Template Folders ---------- */
    
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        return view('backend.mailchimp.template_folders.index');
    }

    // Create a template folder
    public function postTemplateFolders(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
    
            $result = $this->mailChimp->post("template-folders", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all template folders
    public function getTemplateFolders()
    {
        try {
            $result = $this->mailChimp->get("template-folders");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get a template folder
    public function showTemplateFolders($folder_id)
    {
        try {
            $result = $this->mailChimp->get("template-folders/$folder_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a template folder
    public function patchTemplateFolders(Request $request, $folder_id)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);

            $result = $this->mailChimp->patch("template-folders/$folder_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a template folder
    public function deleteTemplateFolders($folder_id)
    {
        try {
            $result = $this->mailChimp->delete("template-folders/$folder_id");
    
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

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;

class MailChimpTemplatesController extends MailChimpController
{
    /* ---------- Templates ---------- */
    
    public function __construct() {
        parent::__construct();
    }

    // Create a templates 
    public function postTemplates(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'folder_id' => 'string',
                'html' => 'string'
            ]);
    
            $result = $this->mailChimp->post("templates", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all templates
    public function getTemplates()
    {
        try {
            $result = $this->mailChimp->get("templates");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a specific template
    public function showTemplates($template_id)
    {
        try {
            $result = $this->mailChimp->get("templates/$template_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update an existing template
    public function patchTemplates(Request $request, $template_id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'folder_id' => 'string',
                'html' => 'string'
            ]);

            $result = $this->mailChimp->patch("templates/$template_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a specific template
    public function deleteTemplates($template_id)
    {
        try {
            $result = $this->mailChimp->delete("templates/$template_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Templates -> Default Content ---------- */

    // Get the default content for a template
    public function getTemplatesDefault($template_id)
    {
        try {
            $result = $this->mailChimp->get("templates/$template_id/default-content");
    
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

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;

class MailChimpCampaignsController extends MailChimpController
{
    /* ---------- Campaign  ---------- */
    
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        return view('backend.mailchimp.campaigns.index');
    }

    // Create a new campaign
    public function postCampaigns(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required|string'
            ]);
    
            $result = $this->mailChimp->post("campaigns", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all campaigns
    public function getCampaigns()
    {
        try {
            $result = $this->mailChimp->get("campaigns");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a specific campaign
    public function showCampaigns($campaign_id)
    {
        try {
            $result = $this->mailChimp->get("campaigns/$campaign_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a campaign 
    public function patchCampaigns(Request $request, $campaign_id)
    {
        try {
            $request->validate([
                'settings' => 'settings|json'
            ]);

            $result = $this->mailChimp->patch("campaigns/$campaign_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a campaign 
    public function deleteCampaign($campaign_id)
    {
        try {
            $result = $this->mailChimp->delete("campaigns/$campaign_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // ACTIONS

    // Cancel a campaign
    public function postActionCampaignCancelSend($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/cancel-send");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Resend a campaign
    public function postActionCampaignCreateResend($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/create-resend");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Pause an RSS-Driven campaign
    public function postActionCampaignPause($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/pause");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Replicate a campaign
    public function postActionCampaignReplicate($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/replicate");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Resume an RSS-Driven campaign
    public function postActionCampaignResume($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/resume");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Schedule a campaign
    public function postActionCampaignSchedule($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/schedule");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Send a campaign
    public function postActionCampaignSend($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/send");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Send a test email
    public function postActionCampaignSendTest($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/test");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Unschedule a campaign
    public function postActionCampaignUnschedule($campaign_id)
    {
        try {
            $result = $this->mailChimp->post("campaigns/$campaign_id/actions/unschedule");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* --------- Campaigns -> Content --------- */

    // Get campaign content
    public function getCampaignsContent(Request $request, $campaign_id)
    {
        try {
            $result = $this->mailChimp->get("campaigns/$campaign_id/content");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Set campaign content
    public function patchCampaignsContent(Request $request, $campaign_id)
    {
        try {
            $result = $this->mailChimp->patch("campaigns/$campaign_id/content", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* --------- Campaigns -> Feedback --------- */

    // Add campaign feedback
    public function postCampaignsFeedback(Request $request, $campaign_id)
    {
        try {
            $request->validate([
                'message' => 'required|string'
            ]);
    
            $result = $this->mailChimp->post("campaigns/$campaign_id/feedback", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get feedback about a campaign
    public function getCampaignsFeedback($campaign_id)
    {
        try {
            $result = $this->mailChimp->get("campaigns/$campaign_id/feedback");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get a specific feedback message
    public function showCampaignsFeedback($campaign_id, $feedback_id)
    {
        try {
            $result = $this->mailChimp->get("campaigns/$campaign_id/feedback/$feedback_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a campaign feedback message
    public function patchCampaignsFeedback(Request $request, $campaign_id, $feedback_id)
    {
        try {
            $request->validate([
                'message' => 'required|string'
            ]);
            $result = $this->mailChimp->patch("campaigns/$campaign_id/feedback/$feedback_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a campaign feedback message
    public function deleteCampaignFeedback($campaign_id, $feedback_id)
    {
        try {
            $result = $this->mailChimp->delete("campaigns/$campaign_id/feedback/$feedback_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Campaigns -> Send Checklist ---------- */

    // Get the send checklist for a campaign
    public function showCampaignsSendChecklist($campaign_id)
    {
        try {
            $result = $this->mailChimp->get("campaigns/$campaign_id/send-checklist");
    
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

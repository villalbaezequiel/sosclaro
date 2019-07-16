<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;

class MailChimpListsController extends MailChimpController
{
    /* ---------- Lists ---------- */
    
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        return view('backend.mailchimp.lists.index');
    }

    // Get information about all lists
    public function getLists()
    {
        try{
            return response()->json($this->mailChimp->get('lists'));
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a specific list
    public function showList($idList)
    {
        try{
            return response()->json($this->mailChimp->get("lists/$idList"));
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Create a new list
    public function postList(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                
                // object -> json
                'contact' => 'required|json',
                'contact.company' => 'required|string',
                'contact.address1' => 'required|string',
                'contact.address2' => 'string',
                'contact.city' => 'required|string',
                'contact.state' => 'required|string',
                'contact.zip' => 'required|string',
                'contact.country' => 'required|string',
                'contact.phone' => 'string',
    
                'permission_reminder' => 'required|string',
                'use_archive_bar' => 'boolean',
    
                // object -> json
                'campaign_defaults' => 'required|json',
                'campaign_defaults.from_name' => 'required|string',
                'campaign_defaults.from_email' => 'required|string',
                'campaign_defaults.subject' => 'required|string',
                'campaign_defaults.language' => 'required|string',
    
                'notify_on_subscribe' => 'string',
                'notify_on_unsubscribe' => 'string',
                'email_type_option' => 'required|boolean',
                'visibility' => 'string',
                'double_optin' => 'boolean',
                'marketing_permissions' => 'boolean'
            ]);
    
            $result = $this->mailChimp->post("lists", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a specific list
    public function patchList(Request $request, $idList)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                
                // object -> json
                'contact' => 'required|json',
                'contact.company' => 'required|string',
                'contact.address1' => 'required|string',
                'contact.address2' => 'string',
                'contact.city' => 'required|string',
                'contact.state' => 'required|string',
                'contact.zip' => 'required|string',
                'contact.country' => 'required|string',
                'contact.phone' => 'string',
    
                'permission_reminder' => 'required|string',
                'use_archive_bar' => 'boolean',
    
                // object -> json
                'campaign_defaults' => 'required|json',
                'campaign_defaults.from_name' => 'required|string',
                'campaign_defaults.from_email' => 'required|string',
                'campaign_defaults.subject' => 'required|string',
                'campaign_defaults.language' => 'required|string',
    
                'notify_on_subscribe' => 'string',
                'notify_on_unsubscribe' => 'string',
                'email_type_option' => 'required|boolean',
                'visibility' => 'string',
                'double_optin' => 'boolean',
                'marketing_permissions' => 'boolean'
            ]);
    
            
            $result = $this->mailChimp->patch("lists/$idList", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a list
    public function deleteList($idList)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Abuse Reports ---------- */

    // Get information about abuse reports
    public function getListAbuseReports($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/abuse-reports");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get details about a specific abuse report
    public function showListAbuseReports($idList, $abuseReport)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/abuse-reports/$abuseReport");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // get list Activity
    public function getListActivity($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/activity");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // get list Clients
    public function getListClients($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/clients");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // get list growth history
    public function getListGrowthHistory($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/growth-history");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // get list growth history by month
    public function getListGrowthHistoryByMonth($idList, $month)
    {
        try {
            // month example = '2019-06' 'YEAR-MONTH'
            $result = $this->mailChimp->get("lists/$idList/growth-history/$month");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a list's interest categories
    public function getListInterestCategories($idList)
    {
        try{
            return response()->json($this->mailChimp->get("lists/$idList/interest-categories"));
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Create a new interest category
    public function postListInterestCategories(Request $request ,$idList)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'display_order' => 'required|integer',
                'type' => 'required|string'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/interest-categories", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a specific interest category
    public function showListInterestCategories($idList, $interest_category_id)
    {
        try{
            return response()->json($this->mailChimp->get("lists/$idList/interest-categories/$interest_category_id"));
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Create a new interest category
    public function patchListInterestCategories(Request $request ,$idList, $interest_category_id)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'display_order' => 'required|integer',
                'type' => 'required|string'
            ]);
    
            $result = $this->mailChimp->patch("lists/$idList/interest-categories/$interest_category_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a specific interest category
    public function deleteListInterestCategories($idList, $interest_category_id)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/interest-categories/$interest_category_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Interests ---------- */

    // Create a new interest in a specific category
    public function postListInterestByCategory(Request $request ,$idList, $interest_category_id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'display_order' => 'integer'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/interest-categories/$interest_category_id/interests", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all interests in a specific category
    public function getListInterestByCategory($idList, $interest_category_id)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/interest-categories/$interest_category_id/interests");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all interests in a specific category
    public function showListInterestByCategory($idList, $interest_category_id, $interest_id)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/interest-categories/$interest_category_id/interests/$interest_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update interests in a specific category
    public function patchListInterestByCategory(Request $request, $idList, $interest_category_id, $interest_id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'display_order' => 'integer'
            ]);
    

            $result = $this->mailChimp->patch("lists/$idList/interest-categories/$interest_category_id/interests/$interest_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete interests in a specific category
    public function deleteListInterestByCategory($idList, $interest_category_id, $interest_id)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/interest-categories/$interest_category_id/interests/$interest_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Locations ---------- */

    // Get list locations
    public function getListLocations($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/locations");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Members ---------- */

    // Add a new list member
    public function postListMembers(Request $request, $idList)
    {
        try {
            $request->validate([
                'email_address' => 'required|string',
                'status' => 'required|string' // expected: subscribed, unsubscribed, cleaned, pending
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/members", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about members in a list
    public function getListMembers($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members");
    
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
    public function showListMembers($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members/$subscriber_hash");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a list member
    public function patchListMembers(Request $request, $idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->patch("lists/$idList/members/$subscriber_hash", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Remove a list member
    public function deleteListMembers($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/members/$subscriber_hash");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Permanently delete a list member
    public function postDeleteListMembers($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->post("lists/$idList/members/$subscriber_hash/actions/delete-permanent");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Member Activity ---------- */

    // Get information about members in a list
    public function getListMemberActivity($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members/$subscriber_hash/activity");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Member Goals ---------- */

    // Get information about members in a list
    public function getListMemberGoals($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members/$subscriber_hash/goals");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Member Notes ---------- */

    // Get recent notes for a specific list member
    public function postListMemberNote(Request $request, $idList, $subscriber_hash)
    {
        try {
            $request->validate([
                'note' => 'string'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/members/$subscriber_hash/notes", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get recent notes for a specific list member
    public function getListMemberNote($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members/$subscriber_hash/notes");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get recent notes for a specific list member
    public function showListMemberNote($idList, $subscriber_hash, $note_id)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members/$subscriber_hash/notes/$note_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a note
    public function patchListMemberNote(Request $request, $idList, $subscriber_hash, $note_id)
    {
        try {
            $request->validate([
                'note' => 'string'
            ]);
    
            $result = $this->mailChimp->patch("lists/$idList/members/$subscriber_hash/notes/$note_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a note
    public function deleteListMemberNote($idList, $subscriber_hash, $note_id)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/members/$subscriber_hash/notes/$note_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }
    
    /* ---------- Member Tags --------- */

    // Post the tags on a list member.
    public function postListMemberTags(Request $request, $idList, $subscriber_hash)
    {
        try {
            $request->validate([
                'tags' => 'array'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/members/$subscriber_hash/tags", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get the tags on a list member.
    public function getListMemberTags($idList, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/members/$subscriber_hash/tags");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Member Fields --------- */

    // Post the tags on a list member.
    public function postListMemberFields(Request $request, $idList)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'type' => 'required|string' // expected: text, number, address, phone
                                            // date, url, imageurl, radio, dropdown, birthday, zip
            
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/merge-fields", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get all merge fields for a list
    public function getListMemberFields($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/merge-fields");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get a specific merge field
    public function showListMemberFields($idList, $merge_id)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/merge-fields/$merge_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a merge field
    public function patchListMemberFields(Request $request, $idList, $merge_id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'type' => 'required|string' // expected: text, number, address, phone
                                            // date, url, imageurl, radio, dropdown, birthday, zip
            
            ]);
    
            $result = $this->mailChimp->patch("lists/$idList/merge-fields/$merge_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a merge field
    public function deleteListMemberFields($idList, $merge_id)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/merge-fields/$merge_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Segments ---------- */
 
    // Post the tags on a list member.
    public function postListSegments(Request $request, $idList)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'static_segment' => 'array'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/segments", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Batch add/remove list members to segment
    public function postListSegmentByChildren(Request $request, $idList, $segment_id)
    {
        try {
            $request->validate([
                'members_to_add' => 'array',
                'members_to_remove' => 'array'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/segments/$segment_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about all segments in a list
    public function getListSegments($idList)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/segments");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about a specific segment
    public function getListSegmentsByChildren($idList, $segment_id)
    {
        try {
            $result = $this->mailChimp->get("lists/$idList/segments/$segment_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Update a segment
    public function patchListSegment(Request $request, $idList, $segment_id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'static_segment' => 'array'
            ]);
    
            $result = $this->mailChimp->post("lists/$idList/segments/$segment_id", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Delete a segment
    public function deleteListSegment($idList, $segment_id)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/segments/$segment_id");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    /* ---------- Segment Members ---------- */

    // Add a member to a segment
    public function postListSegmentMember(Request $request, $idList, $segment_id)
    {
        try {
            $request->validate([
                'email_address' => 'required|string'
            ]);
            
            $result = $this->mailChimp->post("lists/$idList/segments/$segment_id/members", $request->all());
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Get information about all members in a list segment
    public function getListSegmentMember($idList, $segment_id)
    {
        try { 
            $result = $this->mailChimp->get("lists/$idList/segments/$segment_id/members");
    
            if ($this->mailChimp->success()) {
                return response()->json(['message' => $result, 'status' => true]);
            } else {
                return response()->json(['message' => $this->mailChimp->getLastError(), 'status' => false]);
            }
        } catch(\Exception $e) {
            Functions::catchErr($e);
        }
    }

    // Remove a member from the specified segment
    public function deleteListSegmentMember($idList, $segment_id, $subscriber_hash)
    {
        try {
            $result = $this->mailChimp->delete("lists/$idList/segments/$segment_id/members/$subscriber_hash");
    
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

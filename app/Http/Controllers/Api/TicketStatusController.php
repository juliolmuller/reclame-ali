<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TicketStatus as Status;
use Illuminate\Http\Request;

class TicketStatusController extends Controller
{
    /**
     * Extract attributes from request and save them to the model
     */
    private function save($request, Status $status)
    {
        $status->description = $request->description;
        $status->name = $request->name;
        $status->save();
    }

    /**
     * Return JSON of all status
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Status::orderBy('name')->paginate(30);
    }

    /**
     * Return JSON of given status
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return $status;
    }

    /**
     * Save new status
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = new Status();
        $this->save($request, $status);
        return $status;
    }

    /**
     * Update existing status
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $this->save($request, $status);
        return $status;
    }

    /**
     * Deletes given status
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return $status;
    }
}
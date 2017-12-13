<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    /**
     * View for chat room
     */
    public function showRoom($uuid)
    {
        $room = Room::where('uuid', $uuid)->first();

        if ($room) {
            return view('pages.rooms.room', compact('room'));
        }

        // TODO : room not found
    }

    /**
     * Create a new room
     */
    public function createRoom()
    {

    }

}

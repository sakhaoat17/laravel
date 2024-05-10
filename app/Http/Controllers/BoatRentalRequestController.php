<?php
namespace App\Http\Controllers;
use App\Models\BoatRentalRequest;
use Illuminate\Http\Request;

class BoatRentalRequestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'start_date' => 'required|date_format:Y-m-d', // Expecting format YYYY-MM-DD
            'end_date' => 'required|date_format:Y-m-d|after:start_date',

            'message' => 'required',
            'boat_id' => 'required', // Assuming 'boats' is the name of the boats table
            'registration_id' => 'required', // Assuming 'registrations' is the name of the registrations table
        ]);

        try {
            $rentalRequest = BoatRentalRequest::create($validatedData);
            return response()->json(['message' => 'Boat rental request created successfully', 'rentalRequest' => $rentalRequest]);
        } catch (\Exception $e) {
            // Handle any exceptions or errors that occur during the creation of the boat rental request
            return response()->json(['error' => 'Failed to create boat rental request', 'message' => $e->getMessage()], 500);
        }
    }
    public function fetchRentalRequests($registrationId)
{
    // Fetch rental requests where registration_id is equal to user_id
    $rentalRequests = BoatRentalRequest::where('registration_id', $registrationId)->get();

    // Return the fetched rental requests
    return response()->json($rentalRequests);
}
public function cancelRequest($id)
    {
        try {
            // Find the boat rental request by ID
            $request = BoatRentalRequest::findOrFail($id);

            // Update the status to 'canceled'
            $request->status = 'canceled';
            $request->save();

            // Return a success response
            return response()->json(['message' => 'Boat rental request canceled successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if something went wrong
            return response()->json(['error' => 'Failed to cancel boat rental request. Please try again.'], 500);
        }
    }
    public function getAllRental()
{
    // Fetch all rental requests
    $rentalRequests =BoatRentalRequest::all();

    return response()->json($rentalRequests);
}
public function acceptRequest($requestId)
{
    try {
        // Find the rental request by ID
        $request = BoatRentalRequest::findOrFail($requestId);
        
        // Update the status to 'accepted'
        $request->update(['status' => 'accepted']);
        
        // Return a success response
        return response()->json(['message' => 'Rental request accepted successfully'], 200);
    } catch (\Exception $e) {
        // Return an error response if there's an exception
        return response()->json(['message' => 'Failed to accept rental request'], 500);
    }
}
public function deleteRequest($id)
    {
        try {
            $request = BoatRentalRequest::findOrFail($id);
            $request->delete();
            return response()->json(['message' => 'Request deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting request'], 500);
        }
    }

}

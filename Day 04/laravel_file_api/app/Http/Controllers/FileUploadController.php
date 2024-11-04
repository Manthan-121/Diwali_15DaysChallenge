<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        // Validate the incoming file and optional file_name
        $request->validate([
            'file' => 'required|max:2048',
            'file_name' => 'nullable|string|max:255', // Validate custom file name
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // Get the file extension

            // Check if a custom file name is provided, else use the original name
            $fileName = $request->file_name ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Append the extension if it’s not included
            if (!str_ends_with($fileName, '.' . $extension)) {
                $fileName .= '.' . $extension;
            }

            // Store the file with the custom or original name and correct extension
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $fileType = $file->getClientMimeType();

            // Optional: Save metadata to the database
            // Upload::create(['file_name' => $fileName, 'file_path' => $filePath, 'file_type' => $fileType]);

            return response()->json([
                'success' => true,
                'file_path' => asset('storage/' . $filePath),
                'file_name' => $fileName,
                'file_type' => $fileType
            ], 201);
        }

        return response()->json(['success' => false, 'message' => 'File not uploaded'], 500);
    }
}

<?php

namespace App\Http\Services;
use Illuminate\Http\Response;


class Services
{
    /**
     * It returns a JSON response with a 400 status code and an array of errors
     *
     * @param validator The validator instance.
     *
     * @return A JSON response with a 400 status code.
     */
    public function badRequest($validator)
    {
        return response()->json([
            'errors' => [
                [
                    'key' => 'error',
                    'value' => $validator->errors(),
                ]
            ]
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * It returns a JSON response with a success message.
     *
     * @param record The record that was created/updated/deleted
     *
     * @return A JSON response with a success message and the record that was created.
     */
    public function success($record = null)
    {
        if ($record) {
            return response()->json([
                'data' => [
                    [
                        'success' => true,
                        'record' => $record,
                    ]
                ]
            ], Response::HTTP_OK);
        }
        return response()->json([
            'data' => [
                [
                    'success' => true,
                ]
            ]
        ], Response::HTTP_OK);
    }

    /**
     * It returns a json response with a message that the requested resource was not found.
     */
    public function notFound()
    {
        return response()->json([
            'data' => [
                [
                    'message' => 'لم يتم العثور ',
                ]
            ]
        ], Response::HTTP_NOT_FOUND);
    }
}

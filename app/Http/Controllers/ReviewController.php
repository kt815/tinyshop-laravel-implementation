<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Review;


class ReviewController extends Controller {

    public function index() {
        $reviews = Review::all();
        return view('reviews', [
        	'reviews' => $reviews
        	]);
    }

    public function addReview(Request $request) {
    	$name  = $request->name;
    	$email  = $request->email;
    	$review  = $request->review;
    	$rating  = $request->rating;

		$review = new Review;
		$review->name  = (string)$request->name;
    	$review->email  = (string)$request->email;
    	$review->review  = (string)$request->review;
    	$review->rating  = (int)$request->rating;
		$review->save();

		return redirect('/reviews');

    }

}

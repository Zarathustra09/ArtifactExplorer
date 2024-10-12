<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visitor Feedback</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #C9F1AA;
        }
        .custom-background {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .star-rating {
            direction: rtl;
            display: inline-block;
            padding: 10px 0;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            color: #bbb;
            font-size: 30px;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input[type="radio"]:checked ~ label {
            color: #f2b600;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 custom-background">
            <h2 class="text-center mb-4">Visitor Feedback</h2>
            <form method="POST" action="{{ route('feedback.survey.store') }}">
                @csrf

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                @endif



                <!-- New Questions for APPLICATION -->
                <h3>APPLICATION</h3>
                <div class="form-group">
                    <label for="ease_of_navigation">How would you rate the ease of navigating the ARtifacts Explorer app?</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="ease_of_navigation{{ $i }}" name="ease_of_navigation" value="{{ $i }}">
                            <label for="ease_of_navigation{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="ar_features">How well did the AR features (scanning markers, 3D content) function?</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="ar_features{{ $i }}" name="ar_features" value="{{ $i }}">
                            <label for="ar_features{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="ar_experience">How engaging did you find the AR experience (immersiveness, interactivity)?</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="ar_experience{{ $i }}" name="ar_experience" value="{{ $i }}">
                            <label for="ar_experience{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="recommend_app">How likely are you to recommend the ARtifacts Explorer app to others?</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="recommend_app{{ $i }}" name="recommend_app" value="{{ $i }}">
                            <label for="recommend_app{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="improve_app">What would you improve in the ARtifacts Explorer app?</label>
                    <textarea class="form-control" id="improve_app" name="improve_app" rows="4"></textarea>
                </div>

                <!-- New Questions for MUSEUM -->
                <h3>MUSEUM</h3>
                <div class="form-group">
                    <label for="office_help">The office was willing to help, assist, and provide prompt service.</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="office_help{{ $i }}" name="office_help" value="{{ $i }}">
                            <label for="office_help{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="service_satisfaction">I am generally satisfied with the service I availed.</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="service_satisfaction{{ $i }}" name="service_satisfaction" value="{{ $i }}">
                            <label for="service_satisfaction{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="staff_knowledge">The staff was capable and knowledgeable to perform their duties.</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="staff_knowledge{{ $i }}" name="staff_knowledge" value="{{ $i }}">
                            <label for="staff_knowledge{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="response_clarity">The responses were clear and easily understood.</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="response_clarity{{ $i }}" name="response_clarity" value="{{ $i }}">
                            <label for="response_clarity{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <!-- Existing Questions -->
                <div class="form-group">
                    <label for="rating">How was your visit?</label>
                    <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                            <label for="star{{ $i }}" title="{{ $i }} stars"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

@extends('layouts.products')
<title>
    Contact
</title>
@section('navlink')
@endsection
@section('content')

<body class="bg-light">
    <div class="mt-5 conatiner">
        <div class="text-center">
            <h3 class="text-primary">How Can We Help You?</h3>
            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisic</p>
        </div>
        <div class=" d-flex align-items-center justify-content-center">
            <div class="bg-white col-md-4">
                <div class="p-4 rounded shadow-md">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                    <div>
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" value="name" placeholder="Your Name" required>
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="text" name="email" class="form-control" value="email" placeholder="Your Email" required>
                    </div class="mt-3">
                    <div class="mt-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" value="subject" placeholder="Subject" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" value="message" cols="20" rows="6" class="form-control"
                            placeholder="message"></textarea>
                    </div>
                
                    <button type="submit" class="btn btn-primary">
                        Submit Form
                    </button></form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
@endsection
@section('footer')
@endsection
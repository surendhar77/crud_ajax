<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="padding-right: 45%;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation" style="margin-left:20%">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><h1>Contact Details </h1> </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:20%">
        <ul class="navbar-nav mr-auto">
           
            @if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Log Out</a>
            </li>
        </ul>
    </div>
</nav> 
 
 
 
 

    <div class="container"><br>
        <br>
        <div id="success_message"></div>
        <div id="deleted_message"></div>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewcontact"> Create New Contact</a><br><br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>

            <tbody id="contact">
                @foreach($contacts as $contact)

                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>
                        @if($contact->gender==0)
                        male
                        @else
                        Female
                        @endif
                    </td>
                    <td>{{$contact->phone_number}}</td>
                    <td>@if($contact->country==0)
                        India
                        @elseif($contact->country==1)
                        Srilanka
                        @elseif($contact->country==2)
                        Bangaladesh
                        @else
                        Pakisthan
                        @endif
                    </td>
                    <td>{{$contact->address}}</td>
                    <td>
                        <a href="#" class="btn btn-primary edit" data-id="{{$contact->id}}" data-name="{{$contact->name}}" data-number="{{$contact->phone_number}}" data-email="{{$contact->email}}" data-gender="{{$contact->gender}}" data-country="{{$contact->country}}" data-address="{{$contact->address}}">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{$contact->id}}">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <!-- create-->
    <div class="modal fade" id="createModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modelHeading">Create</h3>
                    <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <!-- <ul id="errList"></ul> -->
                    <form id="contactForm" name="contactForm" method="POST" enctype="multipart/form-data" action="#">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
                            </div>
                            <div id="name_err"></div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your email" required>
                            </div>
                            <div id="email_err"></div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-12 control-label">Phone number</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
                            </div>
                            <div id="number_err"></div>
                        </div>

                        <div class="form-group">
                            <label for="Country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="country">
                                <option selected>Choose...</option>
                                <option value="0">India</option>
                                <option value="1">Srilanka</option>
                                <option value="2">Bangaladesh</option>
                                <option value="3">Pakisthan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="0">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div id="gender_err"></div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <textarea id="address" name="address" placeholder="Enter Your Address" class="form-control" required></textarea>
                            </div>
                            <div id="address_err"></div>
                        </div>
                        <br>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="add" value="create">Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Edit-->
    <div class="modal fade" id="editModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modelHeading">Edit</h3>
                    <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <ul id="errUpdateList"></ul>
                    <form id="editForm" name="editForm" method="POST" enctype="multipart/form-data" action="#">
                        @csrf
                        <input type="hidden" name="contact_id" id="contact_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" id="names" class="form-control">
                            </div>
                            <div id="errName"></div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" name="email" id="mail" class="form-control">
                            </div>
                            <div id="errEmail"></div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-12 control-label">Phone number</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="p_number" name="phone_number">
                            </div>
                            <div id="errNumber"></div>
                        </div>

                        <div class="form-group">
                            <label for="Country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countries">
                                <!-- <option selected>Choose...</option> -->
                                <option value="0">India</option>
                                <option value="1">Srilanka</option>
                                <option value="2">Bangaladesh</option>
                                <option value="3">Pakisthan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="0">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div id="errGender"></div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <textarea id="address" name="address" class="form-control"></textarea>
                            </div>
                            <div id="errAddress"></div>
                        </div>
                            <br>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary updatecontact" id="update" value="update">Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Delete-->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Delete Contact</h3>
                    <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you want to delete this Data?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger deletecontact">Yes, Delete Data</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    //   contact Code
    $(document).ready(function() {
        $('#createNewcontact').click(function(e) {
            $('#createModel').modal('show');
            $('#add').click(function(e) {
                e.preventDefault();
                let formData = new FormData($('#contactForm')[0]);
                $.ajax({
                    url: "{{ route('contact.add') }}",
                    data: formData,
                    type: "POST",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 400) {
                            // $('#errList').html("");
                            // $('#errList').addClass("alert alert-danger");
                              // $('#name_err').addClass("alert alert-danger")
                             // $('#errList').append('<li>' + value + '</li>');
                            $('#name_err').html("");
                            $('#email_err').html("");
                            $('#gender_err').html("");
                            $('#number_err').html("");
                            $('#address_err').html("");
                            $.each(response.errors, function(key, value) {
                                // console.log(key);
                                // console.log(value);
                                // console.log(response.errors.name);
                                if(response.errors.name==value)
                                {
                                    $('#name_err').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.email==value)
                                {
                                    $('#email_err').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.phone_number==value)
                                {
                                    $('#number_err').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.gender==value)
                                {
                                    $('#gender_err').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.address==value)
                                {
                                    $('#address_err').append('<span>' + value + '</span>').css('color', 'red');
                                }
                            });
                        } else {
                            $("#success_message").html("");
                            $("#success_message").addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $("#success_message").addClass('alert alert-success');
                            $('#createModel').modal('hide');
                            $('#createModel').find('input').val("");
                            $('#contactForm').trigger("reset")
                            location.reload();
                        }
                    },
                });
            });
        });
        $(".edit").click(function(e) {
            e.preventDefault();
            $('#editModel').modal('show');
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var country = $(this).data('country');
            var gender = $(this).data('gender');
            var address = $(this).data('address');
            var number = $(this).data('number');
            if (gender == 0) {
                $('input[name=gender][value=0]').attr('checked', true);
            } else {
                $('input[name=gender][value=1]').attr('checked', true);
            }
            if (country == 0) {

                $("#countries").val(0).attr('selected', 'selected');
            } else if (country == 1) {
                $("#countries").val(1).attr('selected', 'selected');
            } else if (country == 2) {
                $("#countries").val(2).attr('selected', 'selected');
            } else {
                $("#countries").val(3).attr('selected', 'selected');
            }
            $('#names').val(name);
            $("#mail").val(email);
            $("#p_number").val(number);
            $('textarea#address').val(address);
            $("#update").val(id);
        });

        $('#update').click(function(e) {
            var id = $(this).val();
            e.preventDefault();
            let formData = new FormData($('#editForm')[0]);
            $.ajax({
                url: "{{route('contact.update', '')}}/" + id,
                data: formData,
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 400) {
                        // $('#errUpdateList').html("");
                        // $('#errUpdateList').addClass("alert alert-danger");
                        // $('#errUpdateList').append('<li>' + value + '</li>');
                        $('#errName').html("");
                        $('#errEmail').html("");
                        $('#errNumber').html("");
                        $('#errGender').html("");
                        $('#errAddress').html("");

                        $.each(response.errors, function(key, value) {
                        
                            if(response.errors.name==value)
                                {
                                    $('#errName').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.email==value)
                                {
                                    $('#errEmail').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.phone_number==value)
                                {
                                    $('#errNumber').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.gender==value)
                                {
                                    $('#errGender').append('<span>' + value + '</span>').css('color', 'red');
                                }
                                if(response.errors.address==value)
                                {
                                    $('#errAddress').append('<span>' + value + '</span>').css('color', 'red');
                                }
                        });
                    } else {
                        $("#success_message").html("");
                        $("#success_message").addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $("#success_message").addClass('alert alert-success');
                        $('#editModel').modal('hide');
                        $('#editModel').find('input').val("");
                        $('#editForm').trigger("reset")
                        location.reload();
                    }
                },
            });
        });
        $(".delete").click(function(e) {
            e.preventDefault();
            $('#deleteModal').modal('show');
            var id = $(this).data('id');
            $('.deletecontact').val(id);
        });
        $('.deletecontact').click(function(e) {
            var id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('contact.delete', '')}}/" + id,
                data: id,
                method: "DELETE",
                success: function(response) {
                    $('#deleteModel').modal('hide');
                    $("#deleted_message").html("");
                    $("#deleted_message").addClass('alert alert-danger');
                    $('#deleted_message').text(response.message);
                    location.reload();

                },
            });
        });
        $('.cancel').click(function(e) {
            $('#deleteModal').modal('hide');
            $('#createModel').modal('hide');
            $('#editModel').modal('hide');
        });

    });
</script>

</html>
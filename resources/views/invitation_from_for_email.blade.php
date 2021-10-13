
<p>Hi, This is {{ $data['name'] }}
<p>Hi, Your Email is  {{ $data['email'] }}</p>


<p>Click Here to accept The the invitation For Login  .</p>

<div class="form-group">

        <a href="http://localhost:8000/registration/{{ $data['name']  }}/{{ $data['email'] }}">
            Accept invitation
        </a>


</div>



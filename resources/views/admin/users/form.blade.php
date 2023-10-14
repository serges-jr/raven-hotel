<form name="UserForm" method="post" id="UserForm" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-floating mb-2">
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}">
                <label for="name" class="form-label">name :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email')}}">
                <label for="email" class="form-label">email :</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-2">
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname')}}">
                <label for="lastname" class="form-label">lastname :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone')}}">
                <label for="phone" class="form-label">phone number :</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group my-2">
                <input type="radio" name="sexe" id="sexe" value="{{ old('adresse', 1) }}">homme <br>
                <input type="radio" name="sexe" id="sexe" value="{{ old('adresse', 0) }}">femme
            </div>
            <div class="form-floating mb-2">
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                <label for="password" class="form-label">password :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="fonction" id="fonction" class="form-control" value="{{ old('fonction') }}">
                <label for="fonction" class="form-label">fonction :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="number" name="salaire" id="salaire" class="form-control" value="{{ old('salaire') }}">
                <label for="salaire" class="form-label">salaire :</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-2">
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                <label for="date" class="form-label">date of birth :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="{{ old('confirm_password') }}">
                <label for="confirm_password" class="form-label">confirm password :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="date" name="dateEmbauche" id="dateEmbauche" class="form-control" value="{{ old('dateEmbauche') }}">
                <label for="dateEmbauche" class="form-label">date Embauche :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}">
                <label for="role" class="form-label">role :</label>
            </div>
        </div>
        <div class="form-floating mb-2">
                <textarea name="adresse" id="adresse" cols="30" rows="10" value="{{ old('adresse') }}" class="form-control"></textarea>
                <label for="adresse">adresse :</label>
            </div>
    </div>
</form>

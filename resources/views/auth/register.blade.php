<div class="container">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;/assets/img/headers/grapes.jpg&quot;);"></div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Criar Conta - {{ env("APP_NAME", "RefoodLink") }}</h4>
                        </div>
                        <form class="user" wire:submit.prevent="submit">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input wire:model.lazy="user.first_name" class="form-control form-control-user" type="text" id="first_name" placeholder="Primeiro nome" name="first_name">
                                    @error('user.first_name') <span class="text-xs text-red">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input wire:model.lazy="user.last_name" class="form-control form-control-user" type="text" id="last_name" placeholder="Último nome" name="last_name">
                                    @error('user.last_name') <span class="text-xs text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="user.email" class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="E-mail" name="email">
                                @error('user.email') <span class="text-xs text-red">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input wire:model.lazy="user.password" class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password">
                                    @error('user.password') <span class="text-xs text-red">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input wire:model.lazy="user.password_confirmation" class="form-control form-control-user" type="password" id="password_confirmation" placeholder="Repetir password" name="password_repeat">
                                    @error('user.password_confirmation') <span class="text-xs text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @error('user') <span class="text-xs text-red">{{ $message }}</span> @enderror
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit">Criar Conta</button>
                            <hr>
                        </form>
                        <!--<div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>-->
                        <div class="text-center"><a class="small" href="entrar">Já tenho conta</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;/assets/img/headers/grapes.jpg&quot;);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">{{ env("APP_NAME", "RefoodLink") }}</h4>
                                </div>
                                <form class="user" wire:submit.prevent="submit">
                                    @csrf
                                    <div class="form-group">
                                        <input wire:model.lazy="user.email" class="form-control form-control-user" type="text" id="email" placeholder="Email" name="email"/>
                                        @error('user.email') <span class="text-red text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input wire:model.lazy="user.password" class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"/>
                                        @error('user.password') <span class="text-red text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <div class="form-check">
                                                <input wire:model.defer="user.remember" class="form-check-input custom-control-input" type="checkbox" id="remember">
                                                <label class="form-check-label custom-control-label" for="remember">Lembrar de mim</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('user') <span class="text-red text-xs">{{ $message }}</span> @enderror
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit">Entrar</button>
                                    <hr>
                                </form>
                                <!--<div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>-->
                                <div class="text-center"><a class="small" href="registar">Ainda não tenho conta</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
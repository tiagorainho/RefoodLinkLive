<div class="container-fluid">
    <h3 class="text-dark mb-4">Perfil</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/avatars/smoking.jpeg" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Alterar Foto</button></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row mb-3 d-none">
                <div class="col">
                    <div class="card text-white bg-primary shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-success shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Definições de utilizador</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="username"><strong>Nome do utilizador</strong></label><input class="form-control" type="text" placeholder="" name="username" value="Tiago Rainho"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="email"><strong>Email</strong></label><input class="form-control" type="email" placeholder="" name="email" value="tiago.rainho@ua.pt"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label for="address"><strong>Localização</strong></label><input class="form-control" type="text" placeholder="" name="address" value="R. Dr. Alberto Souto 24, 3800-148 Aveiro"></div>
                                <div class="custom-control custom-switch mb-2">
                                    <input class="custom-control-input" type="checkbox" id="notification">
                                    <label class="custom-control-label" for="notification"><strong>Ativar notificações</strong><br></label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input class="custom-control-input" type="checkbox" id="emails">
                                    <label class="custom-control-label" for="emails"><strong>Receber emails</strong><br></label>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Guardar</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Definições de vendedor</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="iban"><strong>NIF</strong></label><input class="form-control" type="text" name="IBAN" value="PT 02 3172 3917 123456789 03" pattern="[A-Z]{2}[' ']{0,}[0-9]{2}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{9}[' ']{0,}[0-9]{2}[' ']{0,}"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="bic"><strong>SWIFT/BIC</strong></label><input class="form-control" type="text" value="CTBAAU2S" name="bic" pattern="[A-Z]{8}"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="bank"><strong>Nome do Banco</strong></label><input class="form-control" type="text" value="Santander" name="bank" value=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="owner"><strong>Nome do Titular</strong></label><input class="form-control" type="text" value="João Tiago Rainho" name="owner"></div>
                                    </div>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Guardar</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
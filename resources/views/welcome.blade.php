<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uniswap Interface</title>
    <link rel="stylesheet" href="{{ asset('style/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <style>
        [v-cloak] {
            display: none;
        }

    </style>

</head>

<body style="width: 100%; height: 600px;background: linear-gradient(rgb(32, 39, 56) 0%, rgb(7, 8, 22) 100%);">
    <div id="root">
        <header>
            <nav>
                <div class="logo" style="display:inline; margin-left: 20px">
                    <img src="./images/logo.png " width="40px " />
                </div>

                <ul>
                    <li>Echanger</li>
                    <li>Jetons</li>
                    <li>NTF</li>
                    <li>Poll</li>
                    <li>
                        <div class="input-group " style="width: 480px; color: white; ">
                            <span class="input-group-text " style="background: transparent;border: 1px solid rgb(19, 26, 42)"><i class="fa-solid fa-magnifying-glass "></i></span>
                            <input type="text " class="form-control " style="background: transparent;border: 1px solid rgb(19, 26, 42)" aria-label="Amount (to the nearest dollar) " placeholder="Rechercher des jeton et des collections NTF ">
                            <span class="input-group-text " style="background: transparent;border: 1px solid rgb(19, 26, 42) ">/</span>
                        </div>

                    </li>
                    <li><i class="fa-solid fa-ellipsis"></i></li>
                    {{-- <li>
                        <select class="form-control" style="width:150px;background: transparent;border: 1px solid rgb(19, 26, 42) ">
                            <option>Etherum</option>
                            <option>Option 2</option>
                        </select>
                    </li> --}}
                    <li>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            <img src="{{ asset("images/etherum.png")}}" style="width: 20px;"/> Etherum
                        </button>
                        <ul class="dropdown-menu p-dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                        </div>
                    </li>

                    <li>
                        <!-- Split dropup button -->
                        <div class="btn-group dropup dropup-group">
                            <button type="button" class="rely-btn">
                                Relier
                            </button>|
                            <button type="button" class="dropdown-toggle dropdown-toggle-split dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu p-dropdown-menu">
                                <li>Etherum</li>
                                <li>li 2</li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <section id="main">
            <div class="form">

                <div style="margin-left: 50px;color:white;">
                    <span>
                        Echanger
                    </span>
                    <div style="float:right;margin-right: 25px;" >
                        <i class="fa-solid fa-gear"></i>
                    </div>
                </div>

                <form action="" method="">
                    <div class="input-section fist" v-cloak>
                        <input class="form-control " type="text" name="input1" v-model="firstInput.value" v-on:keyup="convertCurrency(1)" />
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img :src="firstInput.jeton.image" width="20px" />  ${ firstInput.jeton.name }</button>
                    </div>
                    <div class="input-section" v-cloak>
                        <input class="form-control" type="text" name="input2" v-model="secondInput.value"  v-on:keyup="convertCurrency(2)"/>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2"><img :src="secondInput.jeton.image" width="20px" />  ${ secondInput.jeton.name }</button>
                    </div>


                    <div style="position:relative;color:white;bottom:115px;left:45%;"  >
                        <button v-on:click.prevent="myswitch()"  style="background:rgb(19, 26, 42);padding: 5px 10px;border: 2px solid rgb(32, 39, 56);border-radius: 5px" ><i class="fa fa-arrow-down"></i></button>
                    </div>
                    <div class="button-div ">
                        <button v-on:click.prevent="saveWallet()">Enregistrer le portefeuille</button>
                    </div>
                </form>
            </div>
            <div style="text-align:center;color:white">
                </small> <small>Uniswap disponible en : <a href="#" style="text-decoration:none">English</a></small>
            </div>

            <!-- Modal 1-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none!important;color:white">
                        <h5 class="modal-title" id="exampleModalLabel">Sélectionnez un jeton</h5>
                        <button type="button" class="btn-close" id="closeModal1Btn" style="color: white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="row">
                            <div class="col-md-4" v-for="item in jetons" :key="item.id" v-on:click="changeJeton(1 , JSON.stringify(item))">
                                 <div  class="item" ><img :src="item.image" width="20px" />  ${ item.name }</div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                    </div>
                </div>
            </div>

            <!-- Modal 2 -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="example2ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none!important;color:white">
                        <h5 class="modal-title" id="example2ModalLabel">Sélectionnez un jeton</h5>
                        <button type="button" class="btn-close" id="closeModal2Btn" style="color: white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <div class="row">
                            <div class="col-md-4" v-for="item in jetons" :key="item.id" v-on:click="changeJeton(2 , JSON.stringify(item))">
                                 <div  class="item" ><img :src="item.image" width="20px" />  ${ item.name }</div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                    </div>
                </div>
            </div>


        </section>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

    <!-- VueJS and axios -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js" ></script>
    <script src="https://unpkg.com/axios@0.24.0/dist/axios.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" async defer></script>

    <script>
        var vuejsRoot = new Vue({
            el: "#main",
            delimiters: ['${', '}'],
            data: {
                base_url: "http://localhost:8000",
                jetons:[],
                firstInput: {
                    value: 0,
                    jeton: {},
                },
                secondInput: {
                    value: 0,
                    jeton: {},
                },

            },
            mounted() {
                this.getJetons();
            },
            methods:{
                myswitch(){
                    let value = this.firstInput;
                    this.firstInput = this.secondInput;
                    this.secondInput = value;
                    console.log('click');
                },
                getJetons(){
                    axios.get(this.base_url+'/api/jetons')
                    .then((res)=>{
                        this.jetons =res.data.data;
                        this.firstInput.jeton = this.jetons[0];
                        this.secondInput.jeton = this.jetons[1];
                    })
                    .catch((err)=>{
                        console.log(err.message);
                    })
                },
                changeJeton(choix, data){
                   console.log('Jeton change');
                   let jeton = JSON.parse(data);
                   if(choix == 1){
                       this.firstInput.jeton =jeton;
                       this.secondInput.value= this.firstInput.value*this.secondInput.jeton.taux/jeton.taux;
                       document.getElementById("closeModal1Btn").click();
                   }else{
                       this.secondInput.jeton = jeton
                       this.firstInput.value= this.secondInput.value*this.firstInput.jeton.taux/jeton.taux;
                       document.getElementById("closeModal2Btn").click();
                   }

                },
                convertCurrency(choix){
                    if(choix == 1){

                        if(this.firstInput.jeton.id == this.secondInput.jeton.id){
                            this.secondInput.value = this.firstInput.value;
                        }else{
                            this.secondInput.value = this.firstInput.value*this.secondInput.jeton.taux/this.firstInput.jeton.taux;
                        }

                    }else{

                        if(this.firstInput.jeton.id == this.secondInput.jeton.id){
                            this.firstInput.value = this.secondInput.value;
                        }else{
                            this.firstInput.value = this.secondInput.value*this.firstInput.jeton.taux/this.secondInput.jeton.taux;
                        }
                    }
                },
                saveWallet(){
                    axios.post(this.base_url+'/api/wallets',{
                        from_value: this.firstInput.value,
                        from_jeton: this.firstInput.jeton.id,
                        to_value: this.secondInput.value,
                        to_jeton: this.secondInput.jeton.id,
                    })
                    .then((res)=>{

                        if(res.data.status == true){
                            this.firstInput.value = 0;
                            this.secondInput.value = 0;

                            Swal.fire({
                                icon: 'success',
                                title: res.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })

                        }else{

                           Swal.fire({
                              icon: 'error',
                              title: 'Register',
                              text: res.data.message,
                           })
                        }

                    })
                    .catch((err)=>{
                        console.log(err.message)
                        Swal.fire({
                              icon: 'error',
                              title: 'Register',
                              text: err.message,
                           })
                    })
                }


            },
        })
    </script>
    <!-- https://app.uniswap.org/#/swap -->

</body>

</html>

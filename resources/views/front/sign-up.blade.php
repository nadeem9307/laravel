
    @include('front/layout/header')
    <div class=" shadow text-center dark bg-fixed text-light" style="background-image: url({{ asset('public/front') }}/img/banner/3.jpg);">
            <div class="container">
            <div class="contact-us-area default-padding">
            <div class="">
                <div class="register_page_content_wrap">
                <h1>COMMANDEZ!</h1>
                    <h2>Entrer votre email et code postal pour continuer</h2>
                    <form method="post" action="{{ url('delivery') }}" autocomplete="off">
                        @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email" placeholder="Email*" type="email" value="{{old('email')}}">
                                @if(isset($_GET['product_id']))
                                <input type="hidden" name="product_id" value="{{$_GET['product_id']}}">
                                @endif
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Code postal</label>
                                <input class="form-control" id="zip" name="zip" placeholder="Zip code*" type="number" value="{{old('zip')}}">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="emply_lable">&nbsp;</label>
                            <button type="submit" name="submit" id="submit">
                                Continue 
                            </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group aly_shtewe">
                            <span>Already have an account? <a href="{{route('customer-login')}}">Log in</a></span>
                            </div>
                        </div>
                          @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                        <div class="col-md-12">
                            <div class="form-group pisdc___lncdcd">
                            <p>By continuing, you agree to our <a href="{{route('terms-and-conditions')}}">Terms & Conditions</a>. Cook for Me will send you emails of confirmation and suggestions to prepare your meals.</p>
                            </div>
                        </div>
                    <form>
                    </div>
                </div>
            </div>
        </div>    
        
    
            </div>
        </div>
        
    <section class="faq_panel">
        <div class="container">
            
            <div class="faq">
            
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="section-title text-center">
                                <h2>FAQ</h2>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="false" aria-controls="collapseOne">
                                                   Découvrir Cook For Me
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <dl>
                                                    <dt>Tarifs</dt>
                                                    <dd>-Nous proposons un large choix de plats à partir de 19.-<br>
                                                        Retrouvez toutes nos offres <a href="https://www.cookforme.ch/meals">ici</a>, si vous avez la moindre question n’hésitez pas à nous contacter par mail info@cookforme.ch ou téléphone.
                                                    </dd>
                                                    <br>
                                                    <dt>Nous contacter</dt>
                                                    <dd>-Toute notre équipe est à votre entière disposition tout au long de la semaine et vous répond aussi rapidement que possible.<br>
                                                            Nous répondons:<br>
                                                            -Par mail 7/7j: info@cookforme.ch<br>
                                                            -Par téléphone Lun-Ven: +41 79 890 08 60
                                                    </dd>
                                                    <br>
                                                    <dt>Qui fait Cook For Me?</dt>
                                                    <dd>-Cook For Me c’est:<br>
                                                            <b>Greg</b>, notre super Chef, amoureux de la bonne cuisine qui est heureux de la partager avec vous.<br>
                                                            <b>Charlotte</b>, notre co-fondatrice, quand elle n’est pas sur son vélo pour vous livrer, elle répond à vos appels ou mails et fait tout pour trouver des solutions à vos demandes.<br>
                                                            <b>Elio</b>, notre co-fondateur, c’est celui qu’on appelle « au secours » si il y a un problème!<br>
                                                            Et puis il y à <b>Vous</b>, qui croyez en nous, alors MERCI
                                                    </dd>
                                                    <br>
                                                    <dt>C’est quoi Cook For Me?</dt>
                                                    <dd>- Vous aimez déguster des bons plats et faites attention à la qualité de vos produits et à leur provenance, mais vous aimez aussi profitez de votre temps libre … <br>
                                                        NOUS SOMMES LA POUR VOUS AIDER A GAGNER DU TEMPS ET A BIEN MANGER <br>
                                                            -La carte est composée de plats traditionnels et de spécialités de notre Chef Greg, mais aussi de choix végétariens, qui sauront ravir vos papilles.<br>
                                                            -Nos produits sont frais, de saison, principalement locaux ou labélisés, toujours sélectionné avec grande minutie. 100% de nos fournisseurs sont Suisses, et la provenance de nos produits est principalement locale, elle peut varier en fonction des saisons et de la qualité des produits.<br>
                                                            -Notre packaging est éco-responsable, fabriqué à partir de matériaux 100% renouvelables, certifiés et recyclable. La taille des boites est optimisée afin de ne pas encombrer votre réfrigérateur, et sont adaptées au micro-ondes.
                                                    </dd>
                                                    <br>
                                                    <dt>Devenir client Cook For Me</dt>
                                                    <dd><br>- Quelques minutes suffisent, pour nous rejoindre il faut:<br> 
                                                                -Créer un compte<br>
                                                                -Sélectionner vos repas frais<br>
                                                                -Choisir votre jour de livraison, lundi ou jeudi<br>
                                                                -Effectuer le paiement avec votre carte bancaire<br>
                                                                -Vous voilà dans la communauté<br>
                                                        Votre adresse ne figure pas dans les zones de livraison? Contactez-nous pour que nous trouvions une solution ensemble.<br>
                                                    </dd><br>
                                                </dl>
                                                
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    La cuisine de Cook For Me
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <dl>
                                                    <dt>Pour combien de personnes sont prévus les plats?</dt>
                                                    <dd>Nos plats sont conçu pour un adulte et correspondent à des portions individuelles.<br>
                                                        Nous avons pris le parti de séparer les mets des accompagnements, vous laissant ainsi un plus grand choix de composition</dd><br>
                                                    <dt>Modifier les recettes à la carte</dt>
                                                    <dd>N’hésitez pas à nous contacter pour toute demande spécifique par mail, nous ferons notre possible pour trouver une solution.</dd><br>
                                                    <dt>Les produits laitiers</dt>
                                                    <dd>Certains de nos produits peuvent être à base de lait cru ou de lait pasteurisé, voici un récapitulatif.<br>
                                                        Produit à base de lait cru : Beaufort, Brie, Cantal, Comté, Emmental, Grana padano, Saint-Nectaire, Tomme de Savoie<br>
                                                        Produit à base de lait pasteurisé : Beurre, Burrata, Crème liquide et épaisse, Emmental râpé, Faisselle, Feta, Gorgonzola, Lait, Mozzarella, Ricotta
                                                    </dd><br>
                                                    <dt>Régime alimentaire et allergie</dt>
                                                    <dd>Informez nous tout de suite par mail ou appel de vos allergies, elles seront notifié dans notre base de donné, elles vous seront indiquées en plus sur votre mail de confirmation de livraison.</dd><br>
                                                    <dt>Et pour la famille?</dt>
                                                    <dd>Nos plats sont adaptés pour la famille, n’hésitez pas à nous contacter pour plus d’information et travailler ensemble sur une meilleure proposition de packaging.<br> 
                                                        Nous vous conseillons une portion pour deux enfants</dd><br>
                                                    <dt>Ingrédients Bio, GRTA, labélisé</dt>
                                                    <dd>Nous avons comme but de nous améliorer quotidiennement sur la qualité de nos produits, nous sommes en recherche constante à fin de vous proposer toujours plus de produits Grta, bio ou labélisé!<br>
                                                        Chaque étape de plus vers cet objectif commun vous sera notifié dans nos newsletters et dans nos descriptif de recette.</dd><br>
                                                    <br>
                                                </dl>
        
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Paiements
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <dt>Où trouver mon reçu?</dt>
                                                    <dd>Votre reçu vous est envoyé par mail dès la validation du paiement. Vous y trouverez le détail des plats choisis et le total débité.</dd><br>
                                                <dt>Dois-je enregistrer ma carte?</dt>
                                                    <dd>Les données de votre carte bancaire sont utilisées de manière sécurisée et confidentielle par notre fournisseur Stripe, il n’est absolument pas obligatoire de le faire</dd><br>
                                                <dt>Moyen de paiement possible?</dt>
                                                    <dd>Pour le moment nous n’acceptons que le moyen de paiement par carte bancaire, il sera bientôt possible de payer par paypal ainsi que TWINT</dd><br>

                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                                                    La livraison
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <dt>Les jours de livraison</dt>
                                                    <dd>-Nous avons décidé de livrer en deux fois, en effet afin de garder la fraicheur de nos plats, nous produisons vos commandes dans les 24h avant la livraison.<br>
                                                        Vous êtes donc livré le lundi et le jeudi</dd><br>
                                                <dt>Notre transport</dt>
                                                    <dd>Vous verrez circuler notre vélo-cargo dans les rues de Genève, pour une livraison rapide et écolo!</dd><br>
                                                <dt>La chaine du froid</dt>
                                                    <dd>La chaine du froid est maintenue jusqu’à la livraison de votre commande remise en main propre.<br>
                                                        Vos plats sont transportés dans des contenants réfrigérés.<br>
                                                        Les températures sont contrôlés par nos soins.</dd><br>
                                                <dt>Zones de livraison</dt>
                                                    <dd>Pour le moment nous livrons le centre de Genève et Carouge les codes postaux 1201,1202,1203,1204,1205,1206,1207,1208,1209,1227<br>
                                                        Si vous ne rentrez pas dans ces catégories n’hésitez pas à nous contacter afin de trouver une solution</dd><br>
                                                <dt>Problème avec un plat</dt>
                                                    <dd>-Contactez nous tout de suite, nous ferons tout pour vous répondre et vous apporter une solution.</dd><br>
                                                <dt>Si je suis absent</dt>
                                                    <dd>Notifié nous d’un mail ou sms si il y a une possibilité de laisser à une personne tiers ou de modifier l’adresse.<br>
                                                        Sinon les plats seront gardés en notre possession, vous aurez 48h pour les récupérer dans nos locaux. Passé ce délais nous ne pourrons plus les servir pour des raisons d’hygiène et de conservation. Tout frais engendré reste à votre charge.</dd><br>
                                                <dt>Les créneaux de livraison</dt>
                                                    <dd>Lors de la commande vous nous indiquez votre créneau désiré, il vous sera confirmé par mail 24h avant la livraison.<br> 
                                                        La livraison étant faite en vélo-cargo le créneau horaire est dans une fourchette de 2h</dd><br>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5"
                                                    aria-expanded="false" aria-controls="collapse5">
                                                   Préparation et conservation
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse5" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <dl>
                                                    <dt>Conservation de mes plats:</dt>
                                                    <dd>Tous nos plats sont préparés à partir de produits brut et frais dans nos locaux au centre de Genève<br>
                                                        Vous pouvez en moyenne consommer nos plats jusqu’à 4 après la livraison, en les conservant au réfrigérateur<br>
                                                        Vous ne trouverez aucun conservateur ni colorants dans nos plats.<br>
                                                        La conservation de vos plats et indiqué sur la boite d’emballage de vos plats. Il s’agit d’une date limite de consommation que nous vous encourageons à respecter. Si un produit est consommé périmé nous n’engageons aucune responsabilité de notre part.<br>
                                                        Pensez bien à mettre vos plats au frais des réception.</dd><br>
                                                    <dt>Comment faire réchauffer mes plats?</dt>
                                                    <dd>Toutes les instructions pour réchauffez vos plats sont indiquées vos consignes, feuille en papier recyclé livrée avec chaque panier repas, elle récapitule vos plats et les consignes pour les réchauffer au micro-onde ou au four.<br>
                                                        Evidement il se peut que votre micro-onde soit moins puissant ou réglé différemment, si le temps de réchauffage n’est pas satisfaisant prolongé ce dernier par tranche de 30 secondes.<br>
                                                        Si vous réchauffé le plat au four n’oubliez pas de le transférer dans un plat adapté à celui-ci</dd>
                                                    <br>
                                                </dl>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
        
                    </div>
                </div>
            </div>
        </div>

    </section> 
    

       <section class="partner_her_sldi">
        <div class="container">
            
        </div>
    </section>
        
        
        @include('front/layout/footer')


@include('front/layout/header')
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
                                    @if(isset($faqs) && !empty($faqs))
                                    @foreach($faqs as $faq)
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}"
                                                    aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                                   {{ $faq->translation()->first()?$faq->translation()->first()->title:$faq->title }}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse{{$faq->id}}" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                            {{ $faq->translation()->first()?$faq->translation()->first()->description:$faq->description }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <!-- <div class="card">
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
                                    </div> -->
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
            <ul class="partner_logo list-inline">
                 <li>
                 <a href="#">  <img src="{{asset('public/front')}}/img/par_1.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                     <a href="#">   <img src="{{asset('public/front')}}/img/par_2.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{asset('public/front')}}/img/par_3.png" class="img-responsive" alt="Image"></a> 
                 </li>
                 <li>
                      <a href="#"><img src="{{asset('public/front')}}/img/par_4.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"> <img src="{{asset('public/front')}}/img/par_5.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{asset('public/front')}}/img/par_3.png" class="img-responsive" alt="Image"></a>
                 </li>
            </ul>
        </div>
    </section>
    
    
    @include('front/layout/footer')
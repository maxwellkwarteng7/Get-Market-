<section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Women's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="women-item-carousel">
                    <div class="owl-women-item owl-carousel">
                      @foreach($women as $product)
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{url('/view_product',$product->id)}}"><i class="fa fa-eye"></i></a></li>

                                        <li><a href="{{url('/view_product',$product->id)}}"><i class="fa fa-star"></i></a></li>

                                        <li><a href="{{url('/view_product',$product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img style="width:100%; height:360px;" src="products_images/{{$product->image}}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{$product->name}}</h4>
                                <div style="display:flex">
                                  @if($product->discount_price==null)
                                 <div  class="p-2">
                                  <span>Ghs {{$product->price}}</span>
                                 </div>
                               @else
                                 <div style="text-decoration:line-through" class="p-2">
                                  <span>Ghs {{$product->price}}</span>
                                 </div>

                                 <div class="p-2">
                                   <span>Ghs {{$product->discount_price}}</span>
                                 </div>
                               @endif

                                </div>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center" style="padding-top:20px;">
      <a  href="{{url('/all_women_products')}}" class="btn btn-outline-dark">view all</a>
    </div>
</section>

<template>
  <div class="shop">
    <div class="container">
      <div class="product-detail__wrapper">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="product-detail__slide-two">
              <div class="product-detail__slide-two__big">
                <div class="slider__item"><img src="fe/images/product/1.png" alt="Product image"/></div>
                <div class="slider__item"><img src="fe/images/product/2.png" alt="Product image"/></div>
                <div class="slider__item"><img src="fe/images/product/3.png" alt="Product image"/></div>
                <div class="slider__item"><img src="fe/images/product/4.png" alt="Product image"/></div>
              </div>
              <div class="product-detail__slide-two__small">
                <div class="slider__item"><img src="fe/images/product/1.png" alt="Product image"/></div>
                <div class="slider__item"><img src="fe/images/product/2.png" alt="Product image"/></div>
                <div class="slider__item"><img src="fe/images/product/3.png" alt="Product image"/></div>
                <div class="slider__item"><img src="fe/images/product/4.png" alt="Product image"/></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="product-detail__content">
                  <div class="product-detail__content">
                    <div class="product-detail__content__header">
                      <h5>eyes</h5>
                      <h2>The expert mascaraa</h2>
                    </div>
                    <div class="product-detail__content__header__comment-block">
                          <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                      <p>03 review</p><a href="#">Write a reviews</a>
                    </div>
                    <h3>$35.00</h3>
                    <div class="divider"></div>
                    <div class="product-detail__content__footer">
                      <ul>
                        <li>Brand:gucci
                        </li>
                        <li>Product code: PM 01
                        </li>
                        <li>Reward point: 30
                        </li>
                        <li>Availability: In Stock</li>
                      </ul>
                      <div class="product-detail__colors"><span>Color:</span>
                        <div class="product-detail__colors__item" style="background-color: #8B0000"></div>
                        <div class="product-detail__colors__item" style="background-color: #4169E1"></div>
                      </div>
                      <div class="product-detail__controller">
                            <div class="quantity-controller -border -round">
                              <div class="quantity-controller__btn -descrease">-</div>
                              <div class="quantity-controller__number">2</div>
                              <div class="quantity-controller__btn -increase">+</div>
                            </div>
                            <div class="add-to-cart -dark"><a class="btn -round -red" href="#"><i class="fas fa-shopping-bag"></i></a>
                              <h5>Add to cart</h5>
                            </div>
                        <div class="product-detail__controler__actions"></div><a class="btn -round -white" href="#"><i class="fas fa-heart"></i></a>
                      </div>
                      <div class="divider"></div>
                      <div class="product-detail__content__tab">
                        <ul class="tab-content__header">
                          <li class="tab-switcher" data-tab-index="0" tabindex="0">Description</li>
                          <li class="tab-switcher" data-tab-index="1" tabindex="0">Shipping & Returns</li>
                          <li class="tab-switcher" data-tab-index="2" tabindex="0">Reviews ( 03 )</li>
                        </ul>
                        <div id="allTabsContainer">
                          <div class="tab-content__item -description" data-tab-index="0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                          </div>
                          <div class="tab-content__item -ship" data-tab-index="1" style="display:none;">
                            <h5><span>Ship to</span>New york</h5>
                            <ul>
                              <li>Standard Shipping on order over 0kg - 5kg. <span>+10.00</span></li>
                              <li>Heavy Goods Shipping on oder over 5kg-10kg . <span>+20.00</span></li>
                            </ul>
                            <h5>Delivery &amp; returns</h5>
                            <p>We diliver to over 100 countries around the word. For full details of the delivery options we offer, please view our Delivery information.</p>
                          </div>
                          <div class="tab-content__item -review" data-tab-index="2" style="display:none;">
                            <div class="review">
                              <div class="review__header">
                                <div class="review__header__avatar"><img src="https://i1.wp.com/metro.co.uk/wp-content/uploads/2020/03/GettyImages-1211127989.jpg?quality=90&amp;strip=all&amp;zoom=1&amp;resize=644%2C416&amp;ssl=1" alt="Reviewer avatar"/></div>
                                <div class="review__header__info">
                                  <h5>Lionel Messi</h5>
                                  <p>Mar 17, 2020</p>
                                </div>
                                <div class="review__header__rate">
                                                <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                </div>
                              </div>
                              <p class="review__content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p><a class="review__report" href="#">Report as Inappropriate</a>
                            </div>
                            <form>
                              <h5>Write a review</h5>
                              <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="input-validator">
                                    <input type="text" name="name" placeholder="Name"/>
                                  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="input-validator">
                                    <input type="text" name="email" placeholder="Email"/>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="input-validator">
                                    <textarea name="message" placeholder="Message" rows="5"></textarea>
                                  </div><span class="input-error"></span>
                                </div>
                                <div class="col-12">
                                      <button class="btn -dark">Write a review
                                      </button>
                                </div>
                              </div>
                            </form>
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
  </div>
</template>

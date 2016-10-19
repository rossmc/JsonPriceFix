# JsonPriceFix
#### Overview
Magento CE 1.9.3 does not update prices on configurable or bundles products properly.  The cloned price which is often used is themes is not updated.

```html
<span class="regular-price" id="product-price-161_clone">
```

The cloned price is hidden on Magento's RWD theme but as it is hidden it, it has little impact.

The price is not updated due to a new file which was added in Magento 1.9.3:
**app/code/core/Mage/Catalog/Helper/Product/Type/Composite.php**

This file removes the `_clone` value on the `idSuffix` key from the `Product.OptionsPrice` JSON object *e.g.*`"idSuffix":"_clone"`.  This value is required on line 218 of *js/varien/product_options.js* to update the cloned price.

```js
$(pair.value+this.duplicateIdSuffix).select('.price')[0].innerHTML = formattedPrice;
```

This Magento module fixes this issue by using the preferred method of class rewrites for updating this new Magento core file to add the  `_clone` value back in.

#### Installation
* Download latest version [here](https://github.com/rossmc/JsonPriceFix/archive/master.zip). 
* Unzip to Magento root folder.
* Clear cache.
* The price should now update correctly.
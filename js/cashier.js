document.addEventListener('alpine:init', function () {
    console.log("Alpine.js initialized");

    Alpine.data('products', function(products) {
        let _this = this
        return {
            products,

            payment: 0,

            carts: [],

            init() {
                _this.$watch('carts', function() {
                    _this.$refs.change.innerText = '--'
                })
            },

            validate: function(e) {

                let change = this.calculateChange();

                if (change < 0 || this.carts.length == 0)
                    e.preventDefault()
            },

            calculateChange: function()
            {
                let change = this.payment - this.totalPrice

                if (change < 0) {
                    alert('Not enought payement');
                } else {
                    this.$refs.change.innerText = `$${change}`;
                }

                return change;
            },

            calculateIva: function()
            {
                let iva = this.totalPrice * 0.13;
                this.$refs.iva.innerText = `$${iva.toFixed(2)}`;

               

                return iva;
            },

            Calcular_total: function()
            {
                let iva = this.totalPrice * 0.13;
                let total = this.totalPrice + iva;
                this.$refs.total.innerText = `$${total.toFixed(2)}`;
                return total;
            },

            get totalPrice() {
                return this.carts.reduce((acm, cart) => {
                    return acm + (cart.quantity * cart.product.price)
                }, 0)
            },

            subtractQuantity: function(cart) {
                cart.quantity--
                if (cart.quantity < 1) {
                    this.carts = this.carts.filter(_cart => _cart.product.id != cart.product.id)
                }
            },

            addQuantity: function(cart){
                if (cart.quantity < cart.product.quantity) {
                    cart.quantity++
                }
            },

            addToCart: function (id) {

                let product = products.find(product=>product.id == id)
                let cart = this.carts.find(cart => cart.product.id == id) 

                if (product.quantity < 1) return alert('Out of stock');


                if (cart) {
                    if (cart.quantity < product.quantity) {
                        cart.quantity++
                    }
                } else {
                    this.carts.push({
                        product: products.find(product=>product.id == id),
                        quantity: 1
                    })
                }
            }
        }

    })

})

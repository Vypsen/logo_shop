import axios from 'axios'

export default class BasketAPI {
    static async getCartData() {
        await axios.get("http://localhost/api/cart/show")        
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            // your action on error success
             console.log(error);
         });
    }

    static async pushCartData(productsData) {
        console.log(productsData)
        axios({
            url: "http://localhost/api/cart/set_quantity",
            method: 'post',
            data: productsData
        })
        .then(function (response) {
            // your action after success
            console.log(response);
        })
        .catch(function (error) {
            // your action on error success
             console.log(error);
         });
    }
}
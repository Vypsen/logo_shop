import axios from "axios";

const domen = "http://localhost"

export default class SingleProductAPI {
    static async getAll(_slug='eos') {
        const response = await axios.get(domen + "/api/catalog/product/details/", {
            params: {
                slug: _slug
            }
        })

        let responses = []

        responses.push(response.data.data.attribute)
        responses.push(response.data.data.brand)
        responses.push(response.data.data.category)
        responses.push(response.data.data.colors)
        responses.push(response.data.data.images)
        responses[4].map((resp) =>{
            resp.path = domen + resp.path
        })
        responses.push(response.data.data.sizes)
        responses.push({
            article_number: response.data.data.article_number,
            description: response.data.data.description,
            discount_price: response.data.data.discount_price,
            id: response.data.data.id,
            is_new: response.data.data.is_new,
            is_sale: response.data.data.is_sale,
            name: response.data.data.name,
            price: response.data.data.price,
            slug: response.data.data.slug
        })
        // console.log(responses[0])
        // console.log(responses[1])
        // console.log(responses[2])
        // console.log(responses[3])
        // console.log(responses[4])
        // console.log(responses[5])
        // console.log(responses[6])
        // let images = []
        // response.data.data.images.map((i) => images.push(i))

        // console.log(response.data.data.images)
        return responses
    }
}
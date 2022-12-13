import axios from "axios";

const domen = "http://localhost"

export default class ImageService {
    static async getAll() {
        const response = await axios.get("http://localhost/api/main_page")
        let responses = []
        responses.push(response.data.data.categories)
        responses.push(response.data.data.landing_slide)
        responses.push(response.data.data.new_products)
        responses.push(response.data.data.sale_products)
        responses[0].map((i) =>  
            i.image[0].path = domen + i.image[0].path
        )

        responses[1].landing_image = domen + responses[1].landing_image

        responses[2].map((i) => {
            i.images.map((j) => {
                j.path = domen + j.path
            })
        })

        // //После исправления пустой картинки удалить!!!!!!!!!!
        // responses[2][1].images.push({id: 124124, path: responses[2][0].images[0].path})
        // // console.log(responses[2][0].images[0].path)

        responses[3].map((i) => {
            i.images.map((j) => {
                j.path = domen + j.path
            })
        })


        return responses;
    }
}
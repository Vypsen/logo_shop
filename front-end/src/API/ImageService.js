import axios from "axios";

const domen = "http://localhost"

export default class ImageService {
    static async getAll() {
        const response = await axios.get("http://localhost/api/main_page")
        let responses = []
        responses.push(response.data.data.categories)
        responses.push(response.data.data.new_products)
        responses.push(response.data.data.sale_products)
        // console.log(responses[0])
        responses[0].map((i) =>{ 
            i.image[0].path = domen + i.image[0].path
        })
        responses[1].map((i) => {
            i.images.map((j) => {
                j.path = domen + j.path
                console.log(j.path)
            })
        })
        // console.log("asfawfd")
        // console.log(responses)
        // return (response.data.data.categories).slice(0, 1);
        return responses;
    }

    // static async getLandingSlide() {
    //     const response = await axios.get("http://localhost/api/main_page")
    //     console.log(response.data.datal.landing_slide)
    //     return (response.data.datal.landing_slide);
    // }
}
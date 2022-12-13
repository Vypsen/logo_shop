import axios from "axios";

const domen = "http://localhost"

export default class CatalogListAPI {
    static async getAll(_page=1) {
        const response = await axios.get(domen + "/api/catalog/product/list", {
            params: {
                page: _page
            }
        })

        let responses2 = []
        responses2.push(response.data.category)
        responses2.push(response.data.data)
        responses2[1].map((resp) => {
            resp.images.map((i) =>
                i.path = domen + i.path
            )
        })
        responses2.push(response.data.filters)
        responses2.push(response.data.links)
        responses2.push(response.data.meta)
        // console.log(responses2[0])
        // console.log(responses2[1])
        // console.log(responses2[2])
        // console.log(responses2[3])
        // console.log(responses2[4])
        return responses2
    }
}
import axios from "axios";

const domen = "http://localhost"

export default class CatalogListAPI {
    static async getAll(category="", _page=1) {
        let linkApi = "/api/catalog/product/list?category%20name="
        if (category === "") 
        {
            linkApi = "/api/catalog/product/list"
        }
        else {
            linkApi = "/api/catalog/product/list?category%20name="
        }
        let response = []
        try {
            response = await axios.get(domen + linkApi + category, {
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
        catch(e)
        {
            console.log(e)
            response = e
            return response
        }

    }
}
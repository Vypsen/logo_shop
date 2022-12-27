import axios from "axios";

const domen = "http://localhost"

export default class CatalogListAPI {
    static async getAll(category="", _page=1, _sort_mode) {
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
                    page: _page,
                    sort_mode: _sort_mode
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

    static async searchBy(_page = 1, _search_query) {
        let linkApi = "/api/catalog/product/list"
        let response = []
        try {
            response = await axios.get(domen + linkApi, {
                params: {
                    page: _page,
                    search_query: _search_query
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
            responses2.push(response.data.countProducts)
            // console.log(responses2[0])
            // console.log(responses2[1])
            // console.log(responses2[2])
            // console.log(responses2[3])
            // console.log(responses2[4])
            console.log(responses2)
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
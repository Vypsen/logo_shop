import axios from "axios";

const domen = "http://localhost"

export default class CategoriesListAPI {
    static async getAll() {
        const response = await axios.get(domen + "/api/categories/list")

        // console.log(response.data.data)

        let tree = []

        response.data.data.map((i) => {
            let i_temp_arr = []
            i_temp_arr.push(i)
            response.data.data.map((j) => {
                if (i.id === j.parent_id)
                {
                    i_temp_arr.push(j)
                }
            })
            tree.push(i_temp_arr)
        })

        // console.log(tree)

        let tree_to_return = []
        tree.map((i) => {
            if (i.length > 1) {
                tree_to_return.push(i)
            }
        })

        // console.log(tree_to_return)
        // console.log(tree_to_return[0].splice(1))

        return tree_to_return
    }
}
import axios from 'axios'

export default class AuthAPI {
    static async getCode(phone_number) {
        const response = await axios.post("http://localhost/api/auth/sendSms", {
            phone: phone_number
        })
        .then(function (response) {
            console.log(response);
        })
        // .catch(function (error) {
        //     console.log(error);
        // });
    }

    static async sendCode(code_number) {
        axios.post("http://localhost/api/auth/checkSmsCode", {
            user_code: code_number
        })
        .then(function (response) {
            console.log(response);
        })
    }

    static async getCodeFetch(phone_number) {
        const response = await fetch("http://localhost/api/auth/sendSms", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({phone: phone_number})
        })
        .then((response) => console.log(response))
        .then((data) => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    static async sendCodeFetch(code_number) {
        const response = await fetch("http://localhost/api/auth/checkSmsCode", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({user_code: code_number}) 
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
}
import React, { useState } from 'react'
import AuthAPI from '../API/AuthAPI'

export const AuthTest = () => {

    sessionStorage.setItem("key", "value");

    const [phoneNumber, setPhoneNumber] = useState('')
    const [authCode, setAuthCode] = useState('')


    function handleSubmit(e) {
        e.preventDefault();
        console.log('Отправлена форма.');
    }

    function getCodePost() {
        // AuthAPI.getCode(phoneNumber)
        AuthAPI.getCodeFetch(phoneNumber)
    }

    function checkCodePost() {
        // AuthAPI.sendCode(authCode)
        AuthAPI.sendCodeFetch(authCode)
    }

    return (
        <div>
            <form onSubmit={handleSubmit}>
                <input placeholder='Введите номер телефона' value={phoneNumber} onChange={event => setPhoneNumber(event.target.value)}></input>
                <button type="submit" onClick={getCodePost}>Отправить код</button>
                <input placeholder='Введите код' value={authCode} onChange={event => setAuthCode(event.target.value)}></input>
                <button type="submit" onClick={checkCodePost}>Отправить полученный код</button>
            </form>
        </div>
    )
}
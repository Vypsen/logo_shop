import React, { useEffect, useState } from 'react'
import AuthAPI from '../API/AuthAPI'
import InputMask from 'react-input-mask';

import '../styles/AuthContent_style.css'
import { CountDounTimer } from '../components/UI/Timer/CountDownTimer';

export const AuthContent = () => {


    const [phoneNumber, setPhoneNumber] = useState('')
    const [authCode, setAuthCode] = useState('')
    const [checkGetOrConfirmCode, setCheckGetOrConfirmCode] = useState(true)

    const [isActiveGetCodeBtn, setIsActiveGetCodeBtn] = useState(false)

    const [valueTimer, setValueTimer] = useState('00:00:20')

    function handleSubmit(e) {
        e.preventDefault();
        console.log('Отправлена форма.');
    }

    function getCodePost() {
        var validPhoneNumber = phoneNumber
        validPhoneNumber = validPhoneNumber.replace(/[^+\d]/g, '');
        
        setCheckGetOrConfirmCode(false)
        // AuthAPI.getCode(validPhoneNumber)

        // AuthAPI.getCodeFetch(phoneNumber)
    }

    function checkCodePost() {
        console.log(authCode)
        AuthAPI.sendCode(authCode)
        // AuthAPI.sendCodeFetch(authCode)
    }

    
    function checkPhone(phoneNumberEvent)
    {
        if (phoneNumberEvent.includes('_') || phoneNumberEvent.length < 11)
        {
            setIsActiveGetCodeBtn(false)
        }
        else {
            setIsActiveGetCodeBtn(true)
        }
    }

    function setPhoneNumber_mw(event) {
        setPhoneNumber(event.target.value)
        checkPhone(event.target.value)
    }

    function setAuthCode_mw(event) {
        setAuthCode(event.target.value)
    }

    function getTimerData(dataTimer) {
        setValueTimer(dataTimer)
    }

    return (
        <div className='authContentWrapper'>
            {checkGetOrConfirmCode
            ?
            <>
                <div className='confirmationText'>
                    Подтвердите номер телефона
                </div>
                <div className='notifyText'>
                    Мы отправим СМС с кодом подтверждения
                </div>
                <div>
                    <InputMask
                        mask="+7(999)999-9999" 
                        value={phoneNumber}
                        onChange={setPhoneNumber_mw}
                        alwaysShowMask={true}
                        className='inputPhoneNumber inputPhoneNumber-content'
                    />
                </div>
                <div className={isActiveGetCodeBtn ? 'getCodeBtn getCodeBtn-content' : 'getCodeBtn getCodeBtn-content getCodeBtn-inActive'} onClick={() => {
                    getCodePost()
                }}>
                    Получить код
                </div>
                <div className='policyPrivacyText'>
                    Нажимая на кнопку, вы принимаете политику конфиденциальности и пользовательское соглашение
                </div>
            </>
            :
            <>
                <div className='confirmationText'>
                    Введите код
                </div>
                <div className='notifyText'>
                    Мы отправили код на номер {phoneNumber}
                </div>
                <div>
                    <InputMask
                        value={authCode}
                        mask={'999999'}
                        maskChar="*"
                        onChange={setAuthCode_mw}
                        alwaysShowMask={true}
                        className='inputCodeNumber inputCodeNumber-content'
                    />
                </div>
                <div className='getCodeBtn getCodeBtn-content' onClick={checkCodePost}>
                    Отправить код
                </div>
                <div onClick={() => console.log(valueTimer)} className='reSendCodeStyle'>
                    <div className={(valueTimer == '00:00:00') ? 'reSendCodeStyle-active' : 'reSendCodeStyle'}
                         onClick={() => {
                            if (valueTimer == '00:00:00')
                            {
                                getCodePost()
                            }
                         }}
                    >
                        Отправить код повторно через
                    </div>
                    {(valueTimer == '00:00:00')
                    ? 
                    <>
                    </>
                    :
                    <CountDounTimer TimerValue='00:00:20' TimerSeconds={20} value={valueTimer} setValue={setValueTimer} onChange={getTimerData}/>
                    }
                </div>
                <div onClick={() => setCheckGetOrConfirmCode(true)} className='reWritePhoneNumber'>
                    Хотите изменить номер телефона?
                </div>
                <div className='policyPrivacyText'>
                    Нажимая на кнопку, вы принимаете политику конфиденциальности и пользовательское соглашение
                </div>
            </>

            }
        </div>
    )
}
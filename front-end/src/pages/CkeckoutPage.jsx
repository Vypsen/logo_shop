import React from 'react'
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { AboutOrderCard } from '../components/UI/AboutOrderCard/AboutOrderCard';

import InputMask from 'react-input-mask';

import '../styles/CheckoutPage.css'

const CheckoutPage = () => {

    const navigate = useNavigate()


    const [nameData, setNameData] = useState('')
    const [phoneNumber, setPhoneNumber] = useState('')
    const [emailData, setEmailData] = useState('')
    const [activeRadioBtn, setActiveRadioBtn] = useState(1);
    const [mailIndex, setMailIndex] = useState('')
    const [cityData, setCityData] = useState('')
    const [streetData, setStreetData] = useState('')
    const [homePlaceData, setHomePlaceData] = useState('')
    const [homeFlatData, setHomeFlatData] = useState('')
    const [commentText, setCommentText] = useState('')
    

    function changeActiveRadioBtn(event) {
        setActiveRadioBtn(event.target.value);
        // console.log(nameData)
        // console.log(phoneNumber)
        // console.log(emailData)
        // console.log(activeRadioBtn)
        // console.log(mailIndex)
        // console.log(cityData)
        // console.log(streetData)
        // console.log(homePlaceData)
        // console.log(homeFlatData)
        // console.log(commentText)
        // console.log(commentText)
     }

    function test(event) {
        setPhoneNumber(event.target.value)
    }

    return (
        <div className='checkoutPageContentWrapper'>
            <div className='checkoutLinkTreeWrapper'>
                <div className='checkoutLinkBackTo' onClick={() => navigate(-1)}>
                    <svg width="14" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.8" d="M5 1L1 5L5 9" stroke="#616575" strokeLinecap="round"/>
                    </svg>
                    <div>
                        Вернуться в каталог
                    </div>
                </div>
                <svg width="1" height="22" viewBox="0 0 1 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.65" y1="22" x2="0.649999" y2="1.5299e-08" stroke="#CDCFD6" strokeWidth="0.7"/>
                </svg>
                <div className='checkoutTitle'>
                    Корзина
                </div>
            </div>
            <div className='checkoutMainContentWrapper'>
                <div className='checkoutInputsWrapper'>
                    <div className='NameTelEmailWrapper'>
                        <div>
                            <p>Имя</p>
                            <input type="text" className='checkoutInput' value={nameData} onChange={event => setNameData(event.target.value)}/>
                        </div>

                        <div>
                            <p>Телефон*</p>
                            <InputMask 
                                mask="+7(999)999-9999" 
                                value={phoneNumber}
                                onChange={test}
                                className='checkoutInput'
                            />
                        </div>

                        <div>                  
                            <p>E-mail</p>
                            <input type="email" className='checkoutInput' value={emailData} onChange={event => setEmailData(event.target.value)}/>
                        </div>
                    </div>

                    <div className='checkoutRadioBtnsWrapper'>
                        <p>Способ получения</p>
                        <div>
                            <div className='checkoutLabelWrapper'>
                                <input type="radio" name="radio" value="1"
                                        checked={activeRadioBtn == '1' ? true : false}
                                        onChange={changeActiveRadioBtn} />
                                <div className={activeRadioBtn == '1' ? "checkoutRadioBtnText-active" : "checkoutRadioBtnText"}>
                                    <div>
                                        Самовывоз из шоурума
                                    </div>
                                    <div>
                                        Санкт-Петербург, Выборгское шоссе 5/1
                                    </div>
                                </div>
                            </div>
                            
                            <div className='checkoutLabelWrapper checkoutLabelWrapper-bottom'>
                                <input type="radio" name="radio" value="2"
                                        checked={activeRadioBtn == '2' ? true : false}
                                        onChange={changeActiveRadioBtn} />
                                <div className={activeRadioBtn == '2' ? "checkoutRadioBtnText-active" : "checkoutRadioBtnText"}>
                                    Мне нужна доставка
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className='micshpWrapper'>
                        <div className='MailIndexCityWrapper'>
                            <div>
                                <p>Почтовый индекс*</p>
                                <input type="text" className='checkoutInput checkoutInput-small' value={mailIndex} onChange={event => setMailIndex(event.target.value)}/>
                            </div>
                            
                            <div>
                                <p>Населённый пункт*</p>
                                <input type="text" className='checkoutInput checkoutInput-small' value={cityData} onChange={event => setCityData(event.target.value)}/>
                            </div>
                        </div>

                        <div>     
                            <p>Улица*</p>
                            <input type="text" className='checkoutInput' value={streetData} onChange={event => setStreetData(event.target.value)}/>
                        </div>

                        <div className='HomePlaceWrapper'>
                            <div>
                                <p>Дом*</p>
                                <input type="text" className='checkoutInput checkoutInput-small' value={homePlaceData} onChange={event => setHomePlaceData(event.target.value)}/>
                            </div>

                            <div>
                                <p>Квартира / Офис</p>
                                <input type="text" className='checkoutInput checkoutInput-small' value={homeFlatData} onChange={event => setHomeFlatData(event.target.value)}/>
                            </div>
                        </div>
                    </div>
                    
                    <div className='checkoutCommentWrapper'>
                        <p>Комментарий</p>
                        <textarea 
                            value={commentText}
                            onChange={event => setCommentText(event.target.value)}
                            className='checkoutCommentTextArea'
                        ></textarea> 

                    </div>

                   
                </div>

                <AboutOrderCard title='Ваш заказ' buttonName='Отправить заявку' navigationAdress='/order_success'/>
            </div>
        </div>
    )
}

export default CheckoutPage;
import React from 'react'
import LandingSlidePlate from '../components/UI/LandingSlidePlate/LandingSlidePlate';
import '../styles/AboutPage.css'
import { useSwiper, Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Navigation } from "swiper";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

const AboutPage = () => {
    return (
        <div className='aboutPageWrapper'>
            <div>
                <img src="https://via.placeholder.com/958x217"></img>
                <h1 className='infoText'>Информационная страница</h1>
            </div>
            {/* <button onClick={() => swp.slideNext()}>next</button> */}
            <div className='termsOfReturn'>
                <h1 className='aboutPageTitleWrapper'>Условия возврата</h1>
                <div className='aboutPageTextWrapper'>
                    Воспользоваться этими правами потребитель может только в случае, если ненадлежащее качество не было оговорено продавцов при покупке. 
                    Если при покупке товара отдельные недостатки были оговорены, это не лишает потребителя права предъявить претензии по поводу других обнаруженных недостатков.
                    Если для установки выхода товара из строя требуется дополнительная проверка/экспертиза, 
                    она должна быть произведена в течение 20 дней с момента предъявления требований.
                </div>
                <div className='aboutPageTextWrapper'>
                    Если у продавца отсутствует необходимый товар, замена товара ненадлежащего качества должна быть произведена в течение месяца со дня предъявления требований.
                    На время ремонта потребитель может потребовать безвозмездно предоставить ему аналогичный товар во временное пользование, если ремонт производится более 3 дней с момента подачи претензии.
                </div>
            </div>
            <div >
                <Swiper
                    slidesPerView={3}
                    spaceBetween={0}
                    // navigation={true}
                    navigation={{
                        prevEl: '.button-prev-slide',
                        nextEl: '.button-next-slide',
                    }}
                    modules={[Navigation]}
                    className={"swiperSSS"}
                >
                    <SwiperSlide className='swiper-slide swiperSSS-slide'><img src={'https://via.placeholder.com/266x150'}/></SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'><img src={'https://via.placeholder.com/266x150'}/></SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'><img src={'https://via.placeholder.com/266x150'}/></SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'>Slide 4</SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'><img src={'https://via.placeholder.com/266x150'}/></SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'>Slide 6</SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'><img src={'https://via.placeholder.com/266x150'}/></SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'>Slide 8</SwiperSlide>
                    <SwiperSlide className='swiper-slide swiperSSS-slide'>Slide 9</SwiperSlide>
                    <div className='button-prev-slide'>
                        <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 2L3 12L13 22" stroke="#ADB1BB" strokeWidth="3" strokeLinecap="round"/>
                        </svg>
                    </div>
                    <div className='button-next-slide'>
                        <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 22L12 12L2 2" stroke="#ADB1BB" strokeWidth="3" strokeLinecap="round"/>
                        </svg>
                    </div>
                </Swiper>
            </div>
            <div>
                <h1 className='aboutPageTitleWrapper'>Как Вы можете вернуть товар?</h1> 
                <div className='aboutPageTextWrapper'>
                    Если товар был оплачен банковской картой или через платежную систему WebMoney, Яндекс.Деньги и QIWI Кошелек, отмена операции по оплате товаров происходит в течение пяти рабочих дней с момента поступления заявления о возврате товара в письменном или электронном виде. Обратите внимание, что, в зависимости от вида платежной системы, возврат денежных средств на счет плательщика может занять до 30 дней. 
                </div>
                <div className='aboutPageTextWrapper aboutPageTextWrapperLi'>
                    <ul>
                        <li>консультирование покупателей, помощь в выборе товаров;</li>
                        <li>работа на кассе;</li>
                        <li>участие в выкладке товаров в торговом зале.</li>
                    </ul>
                </div>
            </div>
        </div>
    )
}

export default AboutPage;
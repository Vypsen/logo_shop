import React from 'react'
import '../styles/App.css'
import "../styles/MainPage.css"
import { useEffect, useState } from 'react';
import ImageService from '../API/ImageService';
import { useFetching } from '../components/hooks/useFetching';
import { SvgSelector } from '../utils/SVG/SvgSelector';
import { icons } from '../store/constants.js'
import HorizontalBigPlate from '../components/UI/HorizontalBigPlate/HorizontalBigPlate';
import HorizontalSmallPlate from '../components/UI/HorizontalSmallPlate/HorizontalSmallPlate';
import Loader from '../components/UI/Loader/Loader';
import VerticalSmallPlate from '../components/UI/VerticalSmallPlate/VerticalSmallPlate';
import SquareSmallPlate from '../components/UI/SquareSmallPlate/SquareSmallPlate';
import LandingSlidePlate from '../components/UI/LandingSlidePlate/LandingSlidePlate';

import { Swiper, SwiperSlide } from "swiper/react";

import "swiper/css";
import "swiper/css/pagination";

import "../components/UI/Slider/Slider_style.css";

import { Pagination } from "swiper";
import { Link } from 'react-router-dom';

const MainPage = () => {
    const [landingSlide, setLendingSlide] = useState([])
    const [categoriesSlide, setCategoriesSlide] = useState([])
    const [newProductsSlide, setNewProductsSlide] = useState([])
    const [saleProductsSlide, setSaleProductsSlide] = useState([])

    const [fetchImages, isImagesLoading, imageError] = useFetching(async () => {
        const [response_categories, response_landingSlide, response_newProducts, response_saleProducts] = await ImageService.getAll()
        setLendingSlide(response_landingSlide)
        setCategoriesSlide(response_categories)
        setNewProductsSlide(response_newProducts)
        setSaleProductsSlide(response_saleProducts)
    })

    const getLandingSlide = () => {
        console.log("123")
        console.log(landingSlide)
        console.log(landingSlide)
    }

    useEffect(() => {
        fetchImages()

        console.log(categoriesSlide)
        // setTimeout(getLandingSlide, 10000)
    }, [])

    return (
        <div className='contentWrapper'>
            <div className='landingSlidePlate'>
                {isImagesLoading
                ? <Loader className='loaderStyle3'/>
                : <LandingSlidePlate className='img_wrap'>
                        <img className='bg_img' alt='' src={landingSlide.landing_image}/>
                        <h1>{landingSlide.subtitle}</h1>
                        <SvgSelector id={icons[8]}/>
                    </LandingSlidePlate>
                }
            </div>

            <div className='categoriesWrapper'>
                {isImagesLoading
                ?<div className='categoriesWrapperLineBeforeLoading'>
                    
                    <HorizontalSmallPlate><Loader className='loaderStyle'/></HorizontalSmallPlate>
                    <HorizontalSmallPlate><Loader className='loaderStyle'/></HorizontalSmallPlate>
                    <HorizontalSmallPlate><Loader className='loaderStyle'/></HorizontalSmallPlate>
                </div>
                : <div className='categoriesWrapperLineAfterLoading'>
                    {categoriesSlide.slice(1, 4).map((cs) => 
                        <HorizontalSmallPlate key={cs.name}>
                            <img className='smallPlateImage' alt='' src={cs.image[0].path}></img>
                            <h1>{cs.name}</h1>
                        </HorizontalSmallPlate>
                    )}

                </div>
                }

                {isImagesLoading
                ?<div className='categoriesWrapperLineBeforeLoading'>
                    <HorizontalBigPlate><Loader className='loaderStyle2'/></HorizontalBigPlate>
                    <HorizontalBigPlate><Loader className='loaderStyle2'/></HorizontalBigPlate>
                </div>
                : <div className='categoriesWrapperLineAfterLoading'>
                    {categoriesSlide.slice(4, 6).map((cs) => 
                        <HorizontalBigPlate key={cs.name} onClick={() => console.log("Clicked")}>
                            <img className='bigPlateImage' alt={cs.name} src={cs.image[0].path} draggable="false"></img>
                            <h1>{cs.name}</h1>
                        </HorizontalBigPlate>
                    )}

                </div>
                }

                
                {isImagesLoading
                ?<div className='categoriesWrapperLineBeforeLoading'>
                    <HorizontalSmallPlate><Loader className='loaderStyle'/></HorizontalSmallPlate>
                    <HorizontalSmallPlate><Loader className='loaderStyle'/></HorizontalSmallPlate>
                    <HorizontalSmallPlate><Loader className='loaderStyle'/></HorizontalSmallPlate>
                </div>
                : <div className='categoriesWrapperLineAfterLoading'>
                    {categoriesSlide.slice(7, 10).map((cs) => 
                        <HorizontalSmallPlate key={cs.name}>
                                <img className='smallPlateImage' alt='' src={cs.image[0].path}></img>
                                <h1>{cs.name}</h1>
                        </HorizontalSmallPlate>
                    )}

                </div>
                }

            </div>

            <div className='newGoodsWrapper'>
                <div className='titleText'>
                    Новое поступление
                </div>
                {isImagesLoading
                ?   <div className='categoriesWrapperLineBeforeLoading'>
                        <VerticalSmallPlate><Loader className='loaderStyle4'/></VerticalSmallPlate>
                        <VerticalSmallPlate><Loader className='loaderStyle4'/></VerticalSmallPlate>
                        <VerticalSmallPlate><Loader className='loaderStyle4'/></VerticalSmallPlate>
                        <VerticalSmallPlate><Loader className='loaderStyle4'/></VerticalSmallPlate>
                    </div>
                :   <div className='categoriesWrapperLineAfterLoading'>
                        <Swiper
                            slidesPerView={4}
                            spaceBetween={34}
                            direction={"horizontal"}
                            pagination={{
                                dynamicBullets: true,
                            }}
                            modules={[Pagination]}
                            className="swiperHorizontal"
                        >
                            {newProductsSlide.map((nps) =>
                                <SwiperSlide key={nps.id}>
                                    <Link to={"/product_details/" + nps.slug} className="baseStyleLink">
                                            <VerticalSmallPlate key={nps.name} isNew={nps.is_new} isSale={nps.is_sale}>
                                                <img className='verticalSmallPlateImage' alt='' src={nps.images[0].path}></img>
                                                <h2>{nps.name}</h2>
                                                <h1>{nps.price} ₽</h1>
                                            </VerticalSmallPlate>
                                    </Link>

                                </SwiperSlide>
                            )
                        }
                        </Swiper>
                    </div>
                }

            </div>
            
            <div className='aboutBox'>
                <div className='aboutBoxWrapper'>
                    <div className='aboutBoxTextWrapper'>
                        <h1 className='aboutText'>О компании</h1>
                        <div className='shortInfoText'>
                            Меня зовут Имя Фамилия. Я заказываю одежду Бренд из Страна с персональной скидкой и подбираю для Вас интересные варианты сумок, одежды и обуви в шоуруме.
                        </div>
                    </div>
                    <Link to="/about">
                        <div className='moreInfoBtnWrapper'>
                            <div className='moreInfoBtn'>
                            <svg width="92" height="14" viewBox="0 0 92 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.416 1.676H1.784V11.5H0.28V0.299999H8.92V11.5H7.416V1.676ZM15.8831 11.628C15.1685 11.628 14.5178 11.5107 13.9311 11.276C13.3445 11.0307 12.8378 10.684 12.4111 10.236C11.9951 9.788 11.6698 9.23867 11.4351 8.588C11.2005 7.93733 11.0831 7.196 11.0831 6.364V5.436C11.0831 4.61467 11.2005 3.87867 11.4351 3.228C11.6698 2.57733 12.0005 2.028 12.4271 1.58C12.8538 1.12133 13.3605 0.774666 13.9471 0.539999C14.5338 0.294666 15.1791 0.172 15.8831 0.172C16.5978 0.172 17.2485 0.294666 17.8351 0.539999C18.4218 0.774666 18.9231 1.116 19.3391 1.564C19.7658 2.012 20.0965 2.56133 20.3311 3.212C20.5658 3.86267 20.6831 4.604 20.6831 5.436V6.364C20.6831 7.18533 20.5658 7.92133 20.3311 8.572C20.0965 9.22267 19.7658 9.77733 19.3391 10.236C18.9125 10.684 18.4058 11.0307 17.8191 11.276C17.2325 11.5107 16.5871 11.628 15.8831 11.628ZM15.8831 10.188C16.3525 10.188 16.7845 10.108 17.1791 9.948C17.5738 9.77733 17.9151 9.532 18.2031 9.212C18.4911 8.892 18.7151 8.49733 18.8751 8.028C19.0351 7.548 19.1151 6.99333 19.1151 6.364V5.436C19.1151 4.81733 19.0351 4.27333 18.8751 3.804C18.7151 3.324 18.4911 2.924 18.2031 2.604C17.9151 2.27333 17.5738 2.028 17.1791 1.868C16.7845 1.69733 16.3525 1.612 15.8831 1.612C15.4138 1.612 14.9818 1.69733 14.5871 1.868C14.1925 2.028 13.8511 2.268 13.5631 2.588C13.2751 2.908 13.0511 3.308 12.8911 3.788C12.7311 4.268 12.6511 4.81733 12.6511 5.436V6.364C12.6511 6.98267 12.7311 7.532 12.8911 8.012C13.0511 8.48133 13.2751 8.88133 13.5631 9.212C13.8511 9.532 14.1925 9.77733 14.5871 9.948C14.9818 10.108 15.4138 10.188 15.8831 10.188ZM30.2941 11.5H22.8221V13.9H21.3181V10.124H22.2621C22.4968 9.82533 22.6888 9.516 22.8381 9.196C22.9875 8.86533 23.1048 8.47067 23.1901 8.012C23.2755 7.55333 23.3288 7.004 23.3501 6.364C23.3821 5.71333 23.3981 4.91867 23.3981 3.98V0.299999H30.6781V10.124H31.7981V13.9H30.2941V11.5ZM24.9021 3.98C24.9021 4.79067 24.8915 5.50533 24.8701 6.124C24.8488 6.74267 24.8061 7.29733 24.7421 7.788C24.6781 8.27867 24.5821 8.71067 24.4541 9.084C24.3368 9.45733 24.1768 9.804 23.9741 10.124H29.1741V1.676H24.9021V3.98ZM33.405 0.299999H37.085C38.525 0.299999 39.5757 0.609333 40.237 1.228C40.909 1.84667 41.245 2.732 41.245 3.884C41.245 5.004 40.9037 5.884 40.221 6.524C39.5383 7.15333 38.493 7.468 37.085 7.468H34.909V11.5H33.405V0.299999ZM34.909 1.676V6.092H37.085C38.013 6.092 38.6797 5.90533 39.085 5.532C39.4903 5.15867 39.693 4.60933 39.693 3.884C39.693 3.148 39.4903 2.59867 39.085 2.236C38.6903 1.86267 38.0237 1.676 37.085 1.676H34.909ZM47.3988 11.628C46.6841 11.628 46.0334 11.5107 45.4468 11.276C44.8601 11.0307 44.3534 10.684 43.9268 10.236C43.5108 9.788 43.1854 9.23867 42.9508 8.588C42.7161 7.93733 42.5988 7.196 42.5988 6.364V5.436C42.5988 4.61467 42.7161 3.87867 42.9508 3.228C43.1854 2.57733 43.5161 2.028 43.9428 1.58C44.3694 1.12133 44.8761 0.774666 45.4628 0.539999C46.0494 0.294666 46.6948 0.172 47.3988 0.172C48.1134 0.172 48.7641 0.294666 49.3508 0.539999C49.9374 0.774666 50.4388 1.116 50.8548 1.564C51.2814 2.012 51.6121 2.56133 51.8468 3.212C52.0814 3.86267 52.1988 4.604 52.1988 5.436V6.364C52.1988 7.18533 52.0814 7.92133 51.8468 8.572C51.6121 9.22267 51.2814 9.77733 50.8548 10.236C50.4281 10.684 49.9214 11.0307 49.3348 11.276C48.7481 11.5107 48.1028 11.628 47.3988 11.628ZM47.3988 10.188C47.8681 10.188 48.3001 10.108 48.6948 9.948C49.0894 9.77733 49.4308 9.532 49.7188 9.212C50.0068 8.892 50.2308 8.49733 50.3908 8.028C50.5508 7.548 50.6308 6.99333 50.6308 6.364V5.436C50.6308 4.81733 50.5508 4.27333 50.3908 3.804C50.2308 3.324 50.0068 2.924 49.7188 2.604C49.4308 2.27333 49.0894 2.028 48.6948 1.868C48.3001 1.69733 47.8681 1.612 47.3988 1.612C46.9294 1.612 46.4974 1.69733 46.1028 1.868C45.7081 2.028 45.3668 2.268 45.0788 2.588C44.7908 2.908 44.5668 3.308 44.4068 3.788C44.2468 4.268 44.1668 4.81733 44.1668 5.436V6.364C44.1668 6.98267 44.2468 7.532 44.4068 8.012C44.5668 8.48133 44.7908 8.88133 45.0788 9.212C45.3668 9.532 45.7081 9.77733 46.1028 9.948C46.4974 10.108 46.9294 10.188 47.3988 10.188ZM54.3581 0.299999H61.3981V1.676H55.8621V4.652H58.1821C59.5155 4.652 60.5181 4.96667 61.1901 5.596C61.8621 6.21467 62.1981 7.04667 62.1981 8.092C62.1981 9.15867 61.8675 9.996 61.2061 10.604C60.5555 11.2013 59.5475 11.5 58.1821 11.5H54.3581V0.299999ZM55.8621 6.028V10.124H58.1821C59.0461 10.124 59.6701 9.948 60.0541 9.596C60.4488 9.244 60.6461 8.74267 60.6461 8.092C60.6461 7.44133 60.4488 6.93467 60.0541 6.572C59.6595 6.20933 59.0355 6.028 58.1821 6.028H55.8621ZM71.4198 6.428H65.6278V11.5H64.1238V0.299999H65.6278V5.052H71.4198V0.299999H72.9238V11.5H71.4198V6.428ZM75.4831 0.299999H82.4431V1.676H76.9871V5.052H81.4831V6.428H76.9871V10.124H82.4431V11.5H75.4831V0.299999ZM84.4363 0.299999H91.3963V1.676H85.9403V5.052H90.4363V6.428H85.9403V10.124H91.3963V11.5H84.4363V0.299999Z" fill="white"/>
                                <path d="M-1 13.1H92.1162V13.9H-1V13.1Z" fill="white"/>
                                </svg>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>

            <div className='socialMediaWrapper'>
                <div className='titleText'>
                    Мы в инстаграм
                </div>
                    {isImagesLoading
                    ?<div className='categoriesWrapperLineAfterLoading'>
                        <SquareSmallPlate>
                            <Loader className='loaderStyle5'/>
                        </SquareSmallPlate>
                        <SquareSmallPlate>
                            <Loader className='loaderStyle5'/>
                        </SquareSmallPlate>
                        <SquareSmallPlate>
                            <Loader className='loaderStyle5'/>
                        </SquareSmallPlate>
                        <SquareSmallPlate>
                            <Loader className='loaderStyle5'/>
                        </SquareSmallPlate>
                        <SquareSmallPlate>
                            <Loader className='loaderStyle5'/>
                        </SquareSmallPlate>
                    </div>
                    :<div className='categoriesWrapperLineBeforeLoading'>
                        <SquareSmallPlate><img src='https://via.placeholder.com/224'></img></SquareSmallPlate>
                        <SquareSmallPlate><img src='https://via.placeholder.com/224'></img></SquareSmallPlate>
                        <SquareSmallPlate><img src='https://via.placeholder.com/224'></img></SquareSmallPlate>
                        <SquareSmallPlate><img src='https://via.placeholder.com/224'></img></SquareSmallPlate>
                        <SquareSmallPlate><img src='https://via.placeholder.com/224'></img></SquareSmallPlate>
                    </div>
                    }
                    
            </div>
        </div>
    )
}

export default MainPage
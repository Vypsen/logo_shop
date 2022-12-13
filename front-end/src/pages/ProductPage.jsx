import React, { useState } from 'react'
import VerticalVerySmallPlate from '../components/UI/VerticalVerySmallPlate/VerticalVerySmallPlate'
import '../styles/Products.css'

import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/bundle";

import '../components/UI/Slider/SliderVertical_style.css'
// import required modules
import { Pagination } from "swiper";
import VerticalBigPlate from '../components/UI/VerticalBigPLate/VerticalBigPlate';
import Counter from '../components/UI/Counter/Counter';
import { useFetching } from '../components/hooks/useFetching';
import SingleProductAPI from '../API/SingleProductAPI';
import { useEffect } from 'react';
import Loader from '../components/UI/Loader/Loader';
import { Link, useParams } from 'react-router-dom';
import ColorCircle from '../components/UI/ColorCircles/ColorCircles';

const ProductPage = () => {

    const params = useParams()
    // console.log(params.slug)
    let colorsArray = []


    const [singleColorIsActive, setSingleColorIsActive] = useState([])
    const [productData, setProductData] = useState([])
    const [bigPlateImage, setBigPlateImage] = useState()
    const [attributeData, setAttributeData] = useState([])
    const [brandData, setBrandData] = useState([])
    const [categoryData, setCategoryData] = useState([])
    const [colorsData, setColorsData] = useState([])
    const [imagesData, setIamgesData] = useState([])
    const [sizesData, setSizesData] = useState([])
    const [otherInfoData, setOtherInfoData] = useState([])
    const [images, setImages] = useState([{id: 124124, path: "http://localhost"}])
    const [slug, setSlug] = useState("consequuntur")
    // setSlug("eos")

    const [isL2, setIsL2] = useState({Loading: true})
    let isL = true
    const [fetchData, isDLoading, dataError] = useFetching(async (slug) => {
        const [responseAttributeData,
            responseBrandData,
            responseCategoryData,
            responseColorData, 
            responseImagesData,
            responseSizesData,
            responseOtherInfoData
        ] = await SingleProductAPI.getAll(slug)

        setAttributeData(responseAttributeData)
        setBrandData(responseBrandData)
        setCategoryData(responseCategoryData)
        setColorsData(responseColorData)
        setIamgesData(responseImagesData)
        setSizesData(responseSizesData)
        setOtherInfoData(responseOtherInfoData)
        setBigPlateImage(responseImagesData[0].path)
        console.log(responseImagesData)
        
    })

    useEffect(() => {
        setIsL2({Loading: true})
        fetchData(params.slug)
        setIsL2({Loading: false})
        console.log(imagesData)
    }, [setIsL2])


    function colorSelector(circleColor) {
        colorsArray.splice(0)
        for (let i = 0; i < colorsData.length; i++)
        {
            if (colorsData[i].color_name === circleColor)
            {
                colorsArray.push({st: true, col: colorsData[i].color_name})
                // colorsArray[i].s = true
                // colorsArray[i].c = colorsData.colorName
            }
            else {
                colorsArray.push({st: false, col: colorsData[i].color_name})
                // colorsArray[i].s = false
                // colorsArray[i].c = colorsData.colorName
            }
        }
        setSingleColorIsActive(colorsArray)
    }

    function changeBigPlateImage(newBigPlateImage) {
        setBigPlateImage(newBigPlateImage)
    }


    return (
        <div className='contentWrapper'>
            <div>Главная / Каталог / Жакеты и пиджаки / Жакет Weekend Max Mara ONDINA</div> {/* тестовое древо */}
            <div className='contentWrapperElements'>
                <div className='sliderWrapper'>
                    {/* {isDLoading
                        ?<div><Loader/></div>
                        :<div>{checkData()}</div>
                    } */}

                    <Swiper
                        slidesPerView={2}
                        direction={"vertical"}
                        modules={[Pagination]}
                        className="swiperVertical"
                    >
                        {isDLoading
                        ?   
                        <div>
                                <SwiperSlide> <VerticalVerySmallPlate><Loader/></VerticalVerySmallPlate> </SwiperSlide>
                                <SwiperSlide> <VerticalVerySmallPlate><Loader/></VerticalVerySmallPlate> </SwiperSlide>
                        </div>
                        :   
                        <div>
                            {imagesData.map((i) => 
                                <SwiperSlide key={i.id}>
                                    <VerticalVerySmallPlate onClick={() => changeBigPlateImage(i.path)}>
                                        <img width={180} height={242} alt='' src={i.path}/>
                                    </VerticalVerySmallPlate>
                                </SwiperSlide>

                            )}
                        </div>
                        }
                        {/* <SwiperSlide> <VerticalVerySmallPlate>agsgdasdfg</VerticalVerySmallPlate> </SwiperSlide>
                        <SwiperSlide> <VerticalVerySmallPlate>agsgdasdfg</VerticalVerySmallPlate> </SwiperSlide>
                        <SwiperSlide> <VerticalVerySmallPlate>agsgdasdfg</VerticalVerySmallPlate> </SwiperSlide>
                        <SwiperSlide> <VerticalVerySmallPlate>agsgdasdfg</VerticalVerySmallPlate> </SwiperSlide> */}

                    </Swiper>
                </div>
                <div className='bigPictureWrapper'>
                    <VerticalBigPlate isNew={otherInfoData.is_new} isSale={otherInfoData.is_sale}>
                        <img width={464} height={612} src={bigPlateImage}></img>
                    </VerticalBigPlate>
                </div>
                <div className='contentWrapperInfo'>
                    <h1>{otherInfoData.name} {brandData.brand_name}</h1>
                    <div className='article'>Артикул: {otherInfoData.article_number}</div>
                    <div className='description'>{otherInfoData.description}</div>
                    <div className='compound'>
                        <h2>Состав</h2>
                        {isDLoading
                        ? 
                            <div>Основная ткань: 100% Полиэстер; Пояс: 100% Полиэстер;Подкл: 100% Полиэстер</div>
                        : 
                            <div className='compoundInfoWrapper'>
                                {attributeData.map((ad) => <div key={ad.name}>{ad.name}: {ad.value}; &nbsp; </div>)}
                            </div>
                        }
                    </div>
                    <div className='sizeContentElements'>
                        <h2>Размер</h2>
                        <div className='sizeContentElementsBottomContent'>
                            <select className='selectorSizeStyle' name='sl'>
                                <option className='optionInvisible' disabled hidden></option>
                                {isDLoading
                                ? 
                                    <option></option>
                                : 
                                    <>{sizesData.map((sd) => <option key={sd.size_name} value={sd.size_name}>{sd.size_name}</option>)}</>
                                }
                            </select>
                            <div>
                                <div>Не можете подобрать разер?</div>
                                <div>Запишитесь на примерку в наш шоурум</div>
                            </div>
                        </div>
                    </div>
                    <div className='colorContentElements'>
                        <h2>Цвет</h2>
                        <div className='colorContentWrapper'>
                            {isDLoading
                            ? <div></div>
                            :
                            <div className='colorContentWrapper'>
                                {colorsData.map((cs) => 
                                    <div key={cs.color_name} onClick={() => colorSelector(cs.color_name)}>
                                        <ColorCircle colorName={cs.color_name} colorsState={singleColorIsActive}/>
                                    </div>
                                )}
                            </div>
                            }
                        </div>
                    </div>
                    <div className='orderContentElements'>
                        <div className='priceStyle'>{otherInfoData.price} ₽</div>
                        <div className='orderContentElementsFunctionalBtns'>
                            <div><Counter/></div>
                            <div className='toCartElementStyle'>
                                <div>
                                    В корзину
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    )
}

export default ProductPage
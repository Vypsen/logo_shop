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
import CustomSelect from '../components/UI/CustomSelect/CustomSelect';

const ProductPage = () => {

    const params = useParams()
    // console.log(params.slug)
    let colorsArray = []


    const [singleColorIsActive, setSingleColorIsActive] = useState([])
    const [bigPlateImage, setBigPlateImage] = useState()
    const [attributeData, setAttributeData] = useState([])
    const [brandData, setBrandData] = useState([])
    const [categoryData, setCategoryData] = useState([])
    const [colorsData, setColorsData] = useState([])
    const [imagesData, setIamgesData] = useState([])
    const [sizesData, setSizesData] = useState([])
    const [otherInfoData, setOtherInfoData] = useState([])

    const [selectedSize, setSelectedSize] = useState('')
    const [selectedAmount, setSelectedAmount] = useState(1)
    const [selectedColor, setSelectedColor] = useState('')
    // setSlug("eos")

    const [isL2, setIsL2] = useState({Loading: true})
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
                setSelectedColor(colorsData[i].color_name)
            }
            else {
                colorsArray.push({st: false, col: colorsData[i].color_name})
            }
        }
        setSingleColorIsActive(colorsArray)
    }

    function changeBigPlateImage(newBigPlateImage) {
        setBigPlateImage(newBigPlateImage)
    }

    const getSize = (size) => {
        setSelectedSize(size)
    }

    const getAmount = (amount) => {
        setSelectedAmount(amount)
    }

    const getDataToCart = () => {
        console.log(selectedAmount)
        console.log(selectedSize)
        console.log(selectedColor)
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
                                        <img alt={i.id} width={180} height={242} src={i.path}/>
                                    </VerticalVerySmallPlate>
                                </SwiperSlide>

                            )}
                        </div>
                        }

                    </Swiper>
                </div>
                <div className='bigPictureWrapper'>
                    <VerticalBigPlate isNew={otherInfoData.is_new} isSale={otherInfoData.is_sale}>
                        <img alt={"MainPic"} width={464} height={612} src={bigPlateImage}></img>
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
                            <CustomSelect
                                value={selectedSize}
                                onChange={getSize}
                                options={sizesData}
                            />
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
                                    <div key={cs.id} onClick={() => colorSelector(cs.color_name)}>
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
                            <div>
                                <Counter 
                                    value={selectedAmount} 
                                    setValue={setSelectedAmount}
                                    onChange={getAmount}
                                    />
                            </div>
                            <div className='toCartElementStyle' onClick={() => getDataToCart()}>
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
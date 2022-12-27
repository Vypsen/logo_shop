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
import BasketAPI from '../API/BasketAPI';
import { ModalWindow } from '../components/UI/ModalWindow/ModalWindow';


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

    const [modalWindowPP, setModalWindowPP] = useState(false)

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
        console.log(responseSizesData)
        console.log(colorsData)
    })

    useEffect(() => {
        setIsL2({Loading: true})
        fetchData(params.slug)
        setIsL2({Loading: false})
        console.log(imagesData)
    }, [setIsL2])


    const errorBtn = () => {
        modalWindowPP ? setModalWindowPP(false) : setModalWindowPP(true)
    }

    function colorSelector(circleColor) {
        colorsArray.splice(0)
        for (let i = 0; i < colorsData.length; i++)
        {
            if (colorsData[i].color_name === circleColor)
            {
                colorsArray.push({st: true, col: colorsData[i].color_name})
                setSelectedColor(colorsData[i].id)
                console.log(colorsData[i].id)
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
        // if (selectedSize === '')
        // {
        //     alert("Пиздец ты долбаёб, выбери, сука, размер!")
        // }
        // if (selectedColor === '')
        // {
        //     alert("Пиздец ты долбаёб, выбери, сука, цвет!")
        // }
        if (sizesData.length <= 0 || colorsData.length <= 0)
        {
            console.log("хуйня давай по новой")
        }
        else {
            BasketAPI.pushCartData(
                {"modifications": [{      
                    "product_id": parseInt(otherInfoData.id, 10),
                    "color_id": parseInt(selectedColor, 10),
                    "size_id": parseInt(selectedSize, 10),
                    "quantity": parseInt(selectedAmount, 10)
                }
            ]})
        }
    }

    return (
        <div className='contentWrapper'>
            <div>Главная / Каталог / Жакеты и пиджаки / Жакет Weekend Max Mara ONDINA</div> {/* тестовое древо */}
            <div className='contentWrapperElements'>
                <ModalWindow visible={modalWindowPP} setVisible={setModalWindowPP} CN={'test214'}>
                    {(selectedSize === '' && selectedColor === '')
                        ? 
                            <>
                                <div className='errorModalWindow'>
                                    <div>Вы не выбрали размер и цвет</div>
                                    <div className='errorOKBtn' onClick={errorBtn}>ОК</div>
                                </div>
                            </>
                        :
                            <>
                                {(selectedSize === '')
                                    ?
                                        <>
                                            <div className='errorModalWindow'>
                                                <div>Вы не выбрали размер и цвет</div>
                                                <div className='errorOKBtn' onClick={errorBtn}>ОК</div>
                                            </div>
                                        </>
                                    :
                                        <>
                                            {(selectedColor === '')
                                                ?
                                                    <>
                                                        <div className='errorModalWindow'>
                                                            <div>Вы не выбрали цвет</div>
                                                            <div className='errorOKBtn' onClick={errorBtn}>ОК</div>
                                                        </div>
                                                    </>
                                                :
                                                    <>
                                                        <div className='errorModalWindow'>
                                                            <div>Товар успешно добавлен в корзину</div>
                                                            <div className='errorOKBtn' onClick={errorBtn}>ОК</div>
                                                        </div>
                                                    </>
                                            }
                                        </>
                                }
                            </>
                    }
                </ModalWindow>
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
                                <a className='showRoomStyle' href="https://www.whatsapp.com/">Запишитесь на примерку в наш шоурум</a>
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
                        <div className='priceStyle'>
                            {otherInfoData.is_sale
                                ?
                                    <>
                                        <div className='priceWrapper'>
                                            <div className='salePrice'>{otherInfoData.discount_price} ₽ </div>

                                            <div className='standartPriceWithSale'>{otherInfoData.price}</div>
                                        </div>
                                    </>
                                :
                                    <>
                                        <div className='standartPrice'>{otherInfoData.price}</div>
                                    </>
                            } 
                        </div>
                        <div className='orderContentElementsFunctionalBtns'>
                            <div>
                                <Counter 
                                    value={selectedAmount} 
                                    setValue={setSelectedAmount}
                                    onChange={getAmount}
                                    />
                            </div>
                            <div className='toCartElementStyle' onClick={() => {
                                    if(selectedSize === '')
                                    {   
                                        errorBtn()
                                    } else if (selectedColor === '')
                                    {
                                        errorBtn()
                                    }
                                    else {
                                        getDataToCart()
                                        errorBtn()
                                    }
                                }}>
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
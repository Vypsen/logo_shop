import React, { useState } from 'react'
import "../styles/Catalog.css"
import axios from "axios";
import { useEffect } from 'react';
import ImageTest from '../utils/SVG/ImageTest';
import ImageService from '../API/ImageService';
import { useFetching } from '../components/hooks/useFetching';
import { SvgSelector } from '../utils/SVG/SvgSelector';
import { icons } from '../store/constants.js'
import HorizontalBigPlate from '../components/UI/HorizontalBigPlate/HorizontalBigPlate';
import HorizontalSmallPlate from '../components/UI/HorizontalSmallPlate/HorizontalSmallPlate';
import Loader from '../components/UI/Loader/Loader';
import VerticalSmallPlate from '../components/UI/VerticalSmallPlate/VerticalSmallPlate';
import SquareSmallPlate from '../components/UI/SquareSmallPlate/SquareSmallPlate';

const Catalog = () => {
    const [landingSlide, setLendingSlide] = useState([])
    const [categoriesSlide, setCategoriesSlide] = useState([])
    const [newProductsSlide, setNewProductsSlide] = useState([])
    const [saleProductsSlide, setSaleProductsSlide] = useState([])

    const [fetchImages, isImagesLoading, imageError] = useFetching(async () => {
        const [response_categories, response_newProducts, response_saleProducts] = await ImageService.getAll()
        setLendingSlide(response_categories.slice(0, 1))
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

        // setTimeout(getLandingSlide, 10000)
    }, [])

    return (
        <div className='contentWrapper'>
            <div className='landingSlidePlate'>
                <div className='image_test'> 
                    {isImagesLoading
                    ? <Loader className='loaderStyle3'/>
                    : <div className='img_wrap'>
                        <img className='bg_img' alt='' src={landingSlide.map((ls) => ls.image[0].path)}/>
                        <h1>{landingSlide.map((ls) => ls.name)}</h1>
                        <SvgSelector id={icons[8]}/>
                      </div>}
                </div>
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
                <div className='categoriesWrapperLineAfterLoading'>
                    <VerticalSmallPlate/>
                    <VerticalSmallPlate/>
                    <VerticalSmallPlate/>
                    <VerticalSmallPlate/>
                </div>
            </div>
            <div className='aboutBox'>

            </div>

            <div className='socialMediaPage'>
                <div className='titleText'>
                    Мы в инстаграм
                </div>
                <div className='categoriesWrapperLineAfterLoading'>
                    <SquareSmallPlate/>
                    <SquareSmallPlate/>
                    <SquareSmallPlate/>
                    <SquareSmallPlate/>
                    <SquareSmallPlate/>
                </div>
            </div>
        </div>
    )
}

export default Catalog
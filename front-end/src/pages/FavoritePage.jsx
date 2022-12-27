import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import SingleProductAPI from '../API/SingleProductAPI';
import { useFetching } from '../components/hooks/useFetching';
import VerticalSmallPlate from '../components/UI/VerticalSmallPlate/VerticalSmallPlate';
import { VerticalSmallPlateData } from '../components/UI/VerticalSmallPlate/VerticalSmallPlateData/VerticalSmallPlateData';

import '../styles/FavouritePage.css'

export const FavoritePage = () => {

    const params = useParams()

    const [singleColorIsActive, setSingleColorIsActive] = useState([])
    const [bigPlateImage, setBigPlateImage] = useState()
    const [attributeData, setAttributeData] = useState([])
    const [brandData, setBrandData] = useState([])
    const [categoryData, setCategoryData] = useState([])
    const [colorsData, setColorsData] = useState([])
    const [imagesData, setIamgesData] = useState([])
    const [sizesData, setSizesData] = useState([])
    const [otherInfoData, setOtherInfoData] = useState([])

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

    
    
    return (
        <div>
            <div className='test'>
                FavouritePage
                <div className='fvpWrapper'>
                {isDLoading
                ?
                    <>
                    </>
                :
                    <>
                    {imagesData.map((i) => 
                        <VerticalSmallPlate key={i.id} isNew={otherInfoData.is_new} isSale={otherInfoData.is_sale} isSmartVersion={true}>
                                <VerticalSmallPlateData>
                                    <div>
                                        <img alt={i.id} width={288} height={407} src={i.path}/>
                                        <h2>{otherInfoData.name}</h2>
                                        <h1>{otherInfoData.price} ₽</h1>
                                    </div>
                                </VerticalSmallPlateData>
                                {/* <div className='cntFPS'>
                                    <div className='cntFPS_main'>
                                        <img alt={i.id} width={288} height={407} src={i.path}/>
                                        <h2>{otherInfoData.name}</h2>
                                        <h1>{otherInfoData.price} ₽</h1>
                                    </div>
                                    <div className='cntFPS_secondary'>
                                        <div className='fpsSizes'>
                                            <h2 className='chooseSizeText'>Выберите размер</h2>
                                            <div className='chooseSizeBoxes'>
                                                <div className='sizeBox'>XS</div>
                                                <div className='sizeBox'>S</div>
                                                <div className='sizeBox'>M</div>
                                                <div className='sizeBox'>L</div>
                                                <div className='sizeBox'>XL</div>
                                            </div>
                                        </div>
                                        <button className='toCartBtn' width={200} height={40}>В корзину</button>
                                    </div>
                                </div> */}


                        </VerticalSmallPlate>
                    )}
                    </>
                }
                </div>
                <div className='fvpWrapper'>
                {isDLoading
                ?
                    <>
                    </>
                :
                    <>
                    {imagesData.map((i) => 
                        <VerticalSmallPlate key={i.id} isNew={otherInfoData.is_new} isSale={otherInfoData.is_sale} isSmartVersion={true}>
                                <VerticalSmallPlateData>
                                    <div>
                                        <img alt={i.id} width={288} height={407} src={i.path}/>
                                        <h2>{otherInfoData.name}</h2>
                                        <h1>{otherInfoData.price} ₽</h1>
                                    </div>
                                </VerticalSmallPlateData>
                                {/* <div className='cntFPS'>
                                    <div className='cntFPS_main'>
                                        <img alt={i.id} width={288} height={407} src={i.path}/>
                                        <h2>{otherInfoData.name}</h2>
                                        <h1>{otherInfoData.price} ₽</h1>
                                    </div>
                                    <div className='cntFPS_secondary'>
                                        <div className='fpsSizes'>
                                            <h2 className='chooseSizeText'>Выберите размер</h2>
                                            <div className='chooseSizeBoxes'>
                                                <div className='sizeBox'>XS</div>
                                                <div className='sizeBox'>S</div>
                                                <div className='sizeBox'>M</div>
                                                <div className='sizeBox'>L</div>
                                                <div className='sizeBox'>XL</div>
                                            </div>
                                        </div>
                                        <button className='toCartBtn' width={200} height={40}>В корзину</button>
                                    </div>
                                </div> */}


                        </VerticalSmallPlate>
                    )}
                    </>
                }
                </div>
            </div>

        </div>
    )
}
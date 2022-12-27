import React, { useState } from 'react'
import { useEffect } from 'react'
import { Link, useParams } from 'react-router-dom'
import CatalogListAPI from '../API/CatalogListAPI'
import { useFetching } from '../components/hooks/useFetching'
import CustomSelect from '../components/UI/CustomSelect/CustomSelect'
import Loader from '../components/UI/Loader/Loader'
import VerticalSmallPlate from '../components/UI/VerticalSmallPlate/VerticalSmallPlate'
import { VerticalSmallPlateData } from '../components/UI/VerticalSmallPlate/VerticalSmallPlateData/VerticalSmallPlateData'
import "../styles/Catalog.css"

import jesusImage from '../assets/NotFound.png'

const SearchPage = () => {

    const params = useParams()
    console.log(params)
    const [isL2, setIsL2] = useState({Loading: true})

    const [optionsToSelect, setOptionsToSelect] = useState([{id: 0, size_name: 'asc'}, {id: 1, size_name: 'decs'}])
    const [selectedSort, setSelectedSort] = useState('')
    const [catalogList, setCatalogList] = useState([])
    const [categoryData, setCategoryData] = useState([])
    const [productsListData, setProductsListData] = useState([])
    const [filtersData, setFiltersData] = useState([])
    const [linksData, setLinksData] = useState([])
    const [metaData, setMetaData] = useState([])
    const [totalPages, setTotalPage] = useState(0)
    const [currentPage, setCurrentPage] = useState(1)
    const [currentCategory, setCurentCategory] = useState("")
    const [countProducts, setCountProducts] = useState(1)

    let pagesArray = []
    for (let i = 0; i < totalPages; i++)
    {
        pagesArray.push(i + 1)
    }

    const [fetchData, isDataLoading, dataError] = useFetching(async (currentPage, search_query) => {
        const [
            responseCategoryData ,
            responseProductsListData ,
            responseFiltersData ,
            responseLinksData ,
            responseMetaData ,
            responseCountProducts,
        ] = await CatalogListAPI.searchBy(currentPage, search_query)
        // console.log(responseCategoryData)
        // console.log(responseProductsListData)
        // console.log(responseFiltersData)
        // console.log(responseLinksData)
        // console.log(responseMetaData)
        setCategoryData(responseCategoryData)
        setProductsListData(responseProductsListData)
        setFiltersData(responseFiltersData)
        setLinksData(responseLinksData)
        setMetaData(responseMetaData)
        setTotalPage(responseMetaData.last_page)
        setCurrentPage(responseMetaData.current_page)
        setCountProducts(responseCountProducts)
    })

    

    const getSortedMethod = (sortMethod) => {
        setSelectedSort(sortMethod)
        console.log(sortMethod)
    }

    useEffect(() => {
        setIsL2({Loading: true})
        
        fetchData(params.page, params.search_query)

        setIsL2({Loading: false})

    }, [setIsL2, params])


    const changePage = (page) => {
        setCurrentPage(page)
        fetchData(page, params.search_query) 
    }


    return (
        <div className='contentCatalogWrapper'>
            <div className='treeText'>Главная / Каталог</div>
            <div className='contentSpace'>
            {isDataLoading
            ?
                <>
                <div className='nothingToFind'> Поиск...</div>
                </>
            :
                <>
                    <div className='nothingToFind'>
                        {(countProducts === 0)
                            ?   <>
                                    <div>
                                        По запросу "{params.search_query}" ничего не найдено
                                    </div>
                                </>
                            : <>
                                    <div>
                                        По запросу "{params.search_query}" найдено
                                    </div>
                            </>
                        }
                    </div>
                </>
            }
                <CustomSelect
                    value={selectedSort}
                    onChange={getSortedMethod}
                    options={optionsToSelect}
                    defaultValue={"сортировать"}
                />
            </div>
            <hr className='lineBetweenNameAndProducts'/>
            {isDataLoading
                ?
                    <>
                    </>
                :
                    <>
                        {(countProducts === 0)
                            ? 
                                <>
                                    <img className='jesusStyle' width={600} height={800} src={jesusImage}></img>
                                </>
                            :
                                <>
                                </>

                        }
                    </>
            }
            

            <div className='productsWrapper'>
                {isDataLoading
                ?<>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                </>
                :
                <>
                    {productsListData.slice(0, 3).map((pld) =>
                        <VerticalSmallPlate key={pld.id} isNew={pld.is_new} isSale={pld.is_sale} isSmartVersion={true}>
                            <VerticalSmallPlateData>
                                <Link to={"/product_details/" + pld.slug} className="baseStyleLink">
                                    <img width={288} height={407} src={pld.images[0].path}></img>
                                    <h2>{pld.name}</h2>
                                    <h1>{pld.price} ₽</h1>
                                </Link>
                            </VerticalSmallPlateData>
                        </VerticalSmallPlate>
                    )}
                </>
                }

            </div>
            <div className='productsWrapper'>
            {isDataLoading
                ?<>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                </>
                :
                <>
                    {productsListData.slice(3, 6).map((pld) =>
                        <VerticalSmallPlate key={pld.id} isNew={pld.is_new} isSale={pld.is_sale} isSmartVersion={true}>
                            <VerticalSmallPlateData>
                                <Link to={"/product_details/" + pld.slug} className="baseStyleLink">
                                    <img width={288} height={407} src={pld.images[0].path}></img>
                                    <h2>{pld.name}</h2>
                                    <h1>{pld.price} ₽</h1>
                                </Link>
                            </VerticalSmallPlateData>
                        </VerticalSmallPlate>
                    )}
                </>
                }
            </div>
            <div className='productsWrapper'>
            {isDataLoading
                ?<>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                    <VerticalSmallPlate><Loader className="catalogLoaderStyle"/></VerticalSmallPlate>
                </>
                :
                <>
                    {productsListData.slice(6, 9).map((pld) =>
                        <VerticalSmallPlate key={pld.id} isNew={pld.is_new} isSale={pld.is_sale} isSmartVersion={true}>
                            <VerticalSmallPlateData>
                                <Link to={"/product_details/" + pld.slug} className="baseStyleLink">
                                    <img width={288} height={407} src={pld.images[0].path}></img>
                                    <h2>{pld.name}</h2>
                                    <h1>{pld.price} ₽</h1>
                                </Link>
                            </VerticalSmallPlateData>
                        </VerticalSmallPlate>
                    )}
                </>
                }
            </div>
            {isDataLoading
            ?<div></div>
            :
            <div className='pageWrapper'>
                <Link to={"/catalog/" + (currentPage - 1)} onClick={() => changePage(currentPage - 1)}>
                    <div className={currentPage === 1 ? 'arrowsContainer arrowInviz' : 'arrowsContainer'}>
                        <svg width="17" height="6" viewBox="0 0 17 6" fill="none" xmlns="http://www.w3.org/2000/svg" className='arrowToBack'>
                            <path d="M1 2.5H0.5V3.5H1V2.5ZM17 3L12 0.113249V5.88675L17 3ZM1 3.5H12.5V2.5H1V3.5Z" fill="#616575"/>
                        </svg>
                        <span className='prevPage'>Назад</span>
                    </div>
                </Link>
                {pagesArray.map((p) => 
                    <Link key={p} to={"/catalog/" + p} onClick={() => changePage(p)}>
                        <span key={p} className={currentPage === p ? 'page pageSelected' : 'page'}>{p}</span>
                    </Link> 
                )}
                <Link to={"/catalog/" + (currentPage + 1)} onClick={() => changePage(currentPage + 1)}>
                    <div className={currentPage === totalPages ? 'arrowsContainer arrowInviz' : 'arrowsContainer'}>
                        <span className='nextPage'>Далее</span>
                        <svg width="17" height="6" viewBox="0 0 17 6" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <path d="M1 2.5H0.5V3.5H1V2.5ZM17 3L12 0.113249V5.88675L17 3ZM1 3.5H12.5V2.5H1V3.5Z" fill="#616575"/>
                        </svg>

                    </div>
                </Link>
            </div>

            }
        </div>
    )
}

export default SearchPage
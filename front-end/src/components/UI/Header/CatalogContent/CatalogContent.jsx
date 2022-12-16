import React, { useEffect } from 'react';
import { useState } from 'react';
import CategoriesListAPI from '../../../../API/CategoriesListAPI';
import { wearArray, outerWearArray, accessoriesArray } from '../../../../store/constants';
import { useFetching } from '../../../hooks/useFetching';
import CreateUL from '../../CreateUL/CreateUL';
import './CatalogContent_style.css'

const CatalogContent = () => {

    const [categriesDataResp, setCategoriesDataResp] = useState([])

    const putItToSearchEngine = (name) => {
        console.log(name)
    }

    const lastBox = [
        "Жакеты и пиджаки",
        "Обувь",
        "Сумки и кошельки",
        "Шапки, шляпы, шарфы",
    ]
    
    const [fetchCatalogData, isCatalogDataLoading, catalogDataError] = useFetching(async () => {
        const response = await CategoriesListAPI.getAll()

        setCategoriesDataResp(response)
        // console.log(response)
    })

    useEffect(() => {
        fetchCatalogData()
    }, [])

    return (
        <>
            {isCatalogDataLoading
            ?
            <div className='catalogNavbarContentWrapper'>
                    {/* <div className='catalogNavbarListWrapper'>
                        <div className='main_text_cloth_style'>
                            Одежда
                        </div>
                        <CreateUL firstStyle={'categoriesNavbarWrapper'} secondStyle={'text_cloth_style'} data={wearArray} func={putItToSearchEngine} mode={1}/>
                    </div>
                    <div className='catalogNavbarListWrapper'>
                        <div className='main_text_cloth_style'>
                            Верхняя одежда
                        </div>
                        <CreateUL firstStyle={'categoriesNavbarWrapper'} secondStyle={'text_cloth_style'} data={outerWearArray} func={putItToSearchEngine} mode={1}/>
                    </div>
                    <div className='catalogNavbarListWrapper'>
                        <div className='main_text_cloth_style'>
                            Аксессуары
                        </div>
                        <CreateUL firstStyle={'categoriesNavbarWrapper'} secondStyle={'text_cloth_style'} data={accessoriesArray} func={putItToSearchEngine} mode={1}/>
                    </div>
                    <div className='catalogNavbarListWrapper'>
                        <CreateUL firstStyle={'lastBoxNavbarWrapper'} secondStyle={'main_text_cloth_style'} data={lastBox} func={putItToSearchEngine} mode={1}/>

                    </div> */}
            </div>
            :
            <div className='catalogNavbarContentWrapper'>
                {categriesDataResp.map((cdr) =>
                    <div key={cdr[0].id}className='catalogNavbarListWrapper'>
                        <div className='main_text_cloth_style'>
                            {cdr[0].name}
                        </div>
                        <CreateUL firstStyle={'categoriesNavbarWrapper'} secondStyle={'text_cloth_style'} data={cdr} mode={2}/>
                    </div>
                )

                }
            </div>
            }
            
        </>
    );
}

export default CatalogContent;
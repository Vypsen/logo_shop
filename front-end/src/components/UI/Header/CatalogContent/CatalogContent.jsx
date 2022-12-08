import React from 'react';
import { wearArray, outerWearArray, accessoriesArray } from '../../../../store/constants';
import CreateUL from '../../CreateUL/CreateUL';
import './CatalogContent_style.css'

const CatalogContent = () => {

    const putItToSearchEngine = (name) => {
        console.log(name)
    }

    const lastBox = [
        "Жакеты и пиджаки",
        "Обувь",
        "Сумки и кошельки",
        "Шапки, шляпы, шарфы",
    ]

    return (
        <div className='catalogNavbarContentWrapper'>
                <div className='catalogNavbarListWrapper'>
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

                </div>
            </div>
    );
}

export default CatalogContent;
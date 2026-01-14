<template>
    <table class="app-table">
        <thead>
            <tr>
                <th
                    v-for="(item, i) in theadDataArray"
                    :key="`${item}_${i}`"
                    class="app-table__th"
                    :class="{
                        'app-table__th--def-select': i == 1
                    }"
                >
                    {{ item }}
                </th>
            </tr>
        </thead>
        <tbody>
            <template v-for="(item, i) in salaries" :key="item.month">
                <AppTableRow
                    :trId="`id_${i}`"
                    :dataParentId="`id_${i}`"
                    :hasDropDownMenu="hasDropDownMenu"
                    :cellsPerRow="cellsPerRow"
                    @dropdown="dropdown(i)"
                >
                    <AppTableCell :tbodyDataItem="item.month" />
                    <AppTableCell :tbodyDataItem="item.salary" :defaultSelect="Boolean(true)"/>
                    <AppTableCell :tbodyDataItem="item.prepayment" />
                    <AppTableCell
                        :tbodyDataItem="item.bonus"
                        :greenSelect="fluctuationsValSalaries[i]?.type == 'plus'"
                        :redSelect="fluctuationsValSalaries[i]?.type == 'minus'"
                    >
                        <sup v-if="fluctuationsValSalaries[i]?.val != 0" class="app-fluctuations-value">
                            {{fluctuationsValSalaries[i]?.sign}}{{fluctuationsValSalaries[i]?.val}}
                        </sup>
                    </AppTableCell>
                    <AppTableCell :tbodyDataItem="item.underworking" />
                </AppTableRow>
                <tr v-if="hasDropDownMenu" :data-parent-id="`id_${i}`" ref="dropdownElem" class="dropdown-row">
                    <td :colspan="cellsPerRow" class="app-table__cell-dropdown">
                        <div class="dropdown-row__chart">
                            <apexchart
                                width="100%"
                                type="line"
                                :options="chartOptions"
                                :series="series"
                            ></apexchart>
                        </div>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script setup>
    import { useTemplateRef, onBeforeMount, ref } from 'vue';
    import AppTableRow from '@js/components/ui/AppTable/AppTableRow.vue';
    import AppTableCell from '@js/components/ui/AppTable/AppTableCell.vue';

    const props = defineProps(['salaries']);
    const fluctuationsValSalaries = ref(null);

    const filteredSalaries = (arr) => {
        const salariesFiltered = [];
        arr.filter((item) => {
            const obj = {};
            Object.keys(item).reduce(function(r, e) {
                if ( e !== 'year'
                    && e !== 'currency_id'
                    && e !== 'created_at'
                    && e !== 'updated_at'
                ) {
                    obj[e] = item[e];
                }


            });
            salariesFiltered.push(obj);
        });

        return salariesFiltered;
    }

    const fluctuationsValues = (arr, valName) => {
        const fluctuationsValues = [];
        let val = 0;
        arr.filter((item) => {
            const obj = {};
            Object.keys(item).reduce(function(r, e) {
                if ( e !== valName ) return;
                if (item[e] > val && val !== 0) {
                    obj.key = valName;
                    obj.type = 'plus';
                    obj.sign = '+';
                    obj.val = item[e] - val;
                }

                if (item[e] < val) {
                    obj.key = valName;
                    obj.type = 'minus';
                    obj.sign = '-';
                    obj.val = val - item[e];
                }

                if (item[e] == val || val == 0) {
                    obj.key = valName;
                    obj.type = 'none';
                    obj.sign = '';
                    obj.val = 0;
                }
                val = item[e];

            });
            fluctuationsValues.push(obj);
        });

        return fluctuationsValues;
    }

    onBeforeMount(() => {
        const salariesFiltered = filteredSalaries(props.salaries);
        fluctuationsValSalaries.value = fluctuationsValues(salariesFiltered, 'bonus');
    });

    const theadDataArray = [
        'Дата',
        'Оклад',
        'Аванс',
        'Премия',
        'Подработка'
    ];

    const hasDropDownMenu = true;

    const cellsPerRow = theadDataArray.length;

    const dropdownElem = useTemplateRef('dropdownElem');

    const chartOptions = {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
        },
      };
      const series = [
        {
          name: "series-1",
          data: [30, 40, 35, 50, 49, 60, 70, 91],
        },
      ];

      const dropdown = (index) => {
        dropdownElem.value[index].classList.toggle('dropdown-row--dropped');
      }

    defineExpose({
        theadDataArray,
        cellsPerRow,
        hasDropDownMenu,
        fluctuationsValSalaries
    });
</script>

<style scoped>
    .app-table {
        background-color: var(--color-background-table);
        border: 2px solid var(--color-border-table);
        inline-size: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-block: 2rem;
    }

    .app-table__th {
        background-color: var(--color-background-table);
        border: 1px solid var(--color-border-table);
        font-size: 0.8rem;
        padding-block: 0.4rem;
    }

    .app-table__th--def-select {
        background-color: var(--color-background-table-cell-sel-def);
    }

    .dropdown-row__chart {
        background-color: var(--white-color);
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: 500ms opacity ease, 500ms max-height ease;
    }

    .dropdown-row--dropped {

        .dropdown-row__chart {
            max-height: 350px;
            overflow: visible;
            opacity: 1;
        }
    }

    .app-table__cell-dropdown {
        border: none;
        font-size: 0.8rem;
    }

    .app-fluctuations-value {
        font-size: 0.5rem;
    }
</style>
